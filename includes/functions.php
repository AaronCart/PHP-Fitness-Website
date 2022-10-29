<?php
/* These constants are used so that if any changes are made then those changes will only need to be made once in the constant instead 
of every instance of these paths, integers and formats. */
    const USERS_PATH = 'data/users.json';
    const USER_STATS_PATH = 'data/user_stats.json';
    const CATEGORIES_PATH = 'data/categories.json';
    const USER_SESSION_KEY = 'user';
    const MINUTES_MINIMUM = 1;
    const MINUTES_MAXIMUM = 500;
    const DATE_FORMAT = 'd/m/Y';
    

    // Session_start is always called first.
    session_start();

    // Checks to see if user is logged in or not
    function isUserLoggedIn() {
        return isset($_SESSION[USER_SESSION_KEY]);
    }

    function getLoggedInUser() {
        return isUserLoggedIn() ? $_SESSION[USER_SESSION_KEY] : null;
    }

    // This function is used on the login.php page to validate whether a user is entering correct values
    function loginUser($form) {
        $errors = [];

        $key = 'email';
        if(!isset($form[$key]) || filter_var($form[$key], FILTER_VALIDATE_EMAIL) === false)
            $errors[$key] = 'Email is invalid.';

        $key = 'password';
        if(!isset($form[$key]) || strlen($form[$key]) < 6)
            $errors[$key] = 'Password is required and must contain at least 6 characters.';

        if(count($errors) === 0) {
            $user = getUser($form['email']);
            
            if($user !== null && $user['password'] === $form['password'])
                // Login user.
                $_SESSION[USER_SESSION_KEY] = $user;
            else
                $errors[$key] = 'Login failed, email and/or password was incorrect. Please try again.';
        }

        return $errors;
    }

    // this logout function is used when a user clicks on "Log Out" in the navbar
    function logoutUser() {
        session_unset();
    }

    function getUser($email) {
        $users = readUsers();

        return isset($users[$email]) ? $users[$email] : null;
    }

    function readUsers() {
        return readJsonFile(USERS_PATH);
    }

    // This function is used on the register page to validate the form elements in PHP as required
    function registerUser($form) {
        $errors = [];

        $key = 'firstname';
        if(!isset($form[$key]) || preg_match('/^\s*$/', $form[$key]) === 1)
            $errors[$key] = 'Required: Please Enter Your First Name';
        
        $key = 'surname';
        if(!isset($form[$key]) || preg_match('/^\s*$/', $form[$key]) === 1)
            $errors[$key] = 'Required: Please Enter Your Surname';

        $key = 'email';
        if(!isset($form[$key]) || filter_var($form[$key], FILTER_VALIDATE_EMAIL) === false)
            $errors[$key] = 'Required: Please Enter a Valid Email Address';
        else if(getUser($form[$key]) !== null)
            $errors[$key] = 'The email you provided is already registered';
        
        $key = 'refer';
        if(!isset($form[$key]))
            $errors[$key] = 'Required: Please choose Yes or No';
            
        $key = 'membership';
        if(preg_match('/Choose Your Membership Type/', $form[$key]) === 1)
            $errors[$key] = 'Required: Please select a membership type';

        $key = 'age';
        if(!preg_match('/\b(1[6-9]|[2-9][0-9]|100)\b/', $form[$key]))
            $errors[$key] = 'You must be at least 16 years old to register';

        $key = 'duration';
        if(preg_match('/Choose Your Membership Duration/', $form[$key]) === 1)
            $errors[$key] = 'Required: Please choose a duration for your membership';
        
        $key = 'password';
        /* This regex checks for minimum 6 characters, must start with a capital letter, must end with a number and must contain at least 
           one special character (!^&) This makes up Task C in the Pass section of the assignment spec sheet. */
        if(!isset($form[$key]) || !preg_match('/^[A-Z]+(?=.*[!^&]).{4,}\d+$/', $form[$key]))
            $errors[$key] = 'Password Rules:<br>Must start with a capital letter<br>Must be at least 6 characters long<br>Must contain at least 1 of these special characters (! ^ &)<br>Must end with a number';

        if(count($errors) === 0) {
            // Adds user to the users.json file.
            $user = [
                'firstname' => htmlspecialchars(trim($form['firstname'])),
                'surname' => htmlspecialchars(trim($form['surname'])),
                'email' => htmlspecialchars(trim($form['email'])),
                'membership' => $form['membership'],
                'age' => $form['age'],
                'duration' => $form['duration'],
                'password' => $form['password']
            ];

            $users = readUsers();
            $users[$user['email']] = $user;

            // json file is updated.
            $json = json_encode($users, JSON_PRETTY_PRINT);
            file_put_contents(USERS_PATH, $json, LOCK_EX);

            // Auto-login registered user like the Optional Implementation requires.
            loginUser($user);
        }

        return $errors;
    }

    // Errors are displayed when incorrect values are entered into the register, login and createActivity pages.
    function displayError($errors, $name) {
        if(isset($errors[$name]))
            echo "<div class='text-danger'>{$errors[$name]}</div>";
    }

    // Values are displayed and not forgotten when a user enters the wrong input in forms.
    function displayValue($form, $name) {
        if(isset($form[$name]))
            echo 'value="' . htmlspecialchars($form[$name]) . '"';
    }

    function readJsonFile($path) {
        $json = file_get_contents($path);

        return json_decode($json, true);
    }

    function updateJsonFile($data, $path) {
        $json = json_encode($data, JSON_PRETTY_PRINT);
        file_put_contents($path, $json, LOCK_EX);
    }

    function readCategories() {
        return readJsonFile(CATEGORIES_PATH);
    }

    function getCategory($category) {
        $categories = readCategories();

        return isset($categories[$category]) ? $categories[$category] : null;
    }

    function getUserStats($email) {
        $userStats = readUserStats();

        return isset($userStats[$email]) ? $userStats[$email] : [];
    }

    function getUserStatsForCategory($email, $category) {
        $userStats = getUserStats($email);

        return isset($userStats[$category]) ? $userStats[$category] : [];
    }

    function readUserStats() {
        return readJsonFile(USER_STATS_PATH);
    }

    function updateUserStats($userStats) {
        updateJsonFile($userStats, USER_STATS_PATH);
    }

    // Source: https://www.php.net/manual/en/function.checkdate.php#113205
    function isValidDate($date, $format = DATE_FORMAT)
    {
        $d = DateTime::createFromFormat($format, $date);

        return $d && $d->format($format) === $date;
    }

    // Parts of this createActivity function are sourced from the Week 9 Tutorial
    function createActivity($form, $email, $category) {
        $errors = [];

        $key = 'date';
        if(!isset($form[$key]) || !isValidDate($form[$key]))
            $errors[$key] = 'Date is required and must be in the format dd/mm/yyyy.';

        $key = 'minutes';
        if(!isset($form[$key]) || filter_var($form[$key], FILTER_VALIDATE_INT,
            ['options' => ['min_range' => MINUTES_MINIMUM, 'max_range' => MINUTES_MAXIMUM]]) === false)
        {
            $errors[$key] =
                implode(['Minutes is required and must be between ', MINUTES_MINIMUM, ' and ', MINUTES_MAXIMUM, '.']);
        }
        // Convert validated minutes to an integer for future use (storing as number rather than string in JSON).
        else
            $form[$key] = (int) $form[$key];

        $key = 'goal';
        if(!isset($form[$key]) || filter_var($form[$key], FILTER_VALIDATE_INT,
            ['options' => ['min_range' => MINUTES_MINIMUM, 'max_range' => MINUTES_MAXIMUM]]) === false)
        {
            $errors[$key] =
                implode(['Goal minutes is required and must be between ', MINUTES_MINIMUM, ' and ', MINUTES_MAXIMUM, '.']);
        }
        
        else
            $form[$key] = (int) $form[$key];

        $key = 'weight';
        if(!isset($form[$key]) || filter_var($form[$key], FILTER_VALIDATE_INT, 
            ['options' => ['min_range' => 10, 'max_range' => 400]]) === false) 
        {
            $errors[$key] = 
                implode(['Weight (kg) is required and must be between 10 and 400kg.']);
        }
            
        else
            $form[$key] = (int) $form[$key];

        $key = 'ageMf';
        if(!isset($form[$key]) || filter_var($form[$key], FILTER_VALIDATE_INT,
            ['options' => ['min_range' => 16, 'max_range' => 140]]) === false) 
        {
            $errors[$key] = 
                implode(['Age is required as a whole number (in years) and must be between 16 and 140.']);
        }
            
        else
            $form[$key] = (int) $form[$key];

        $key = 'bmi';
        if(!isset($form[$key]) || filter_var($form[$key], FILTER_VALIDATE_FLOAT,
            ['options' => ['min_range' => 0, 'max_range' => 200]]) === false) 
        {
            $errors[$key] = 
                implode(['Body Mass Index is required']);
        }
            
        else
            $form[$key] = (int) $form[$key];

        if(count($errors) === 0) {
            // Add activity.
            $activity = [
                'date' => htmlspecialchars(trim($form['date'])),
                'minutes' => $form['minutes'],
                'goal' => $form['goal'],
                'weight' => $form['weight'],
                'ageMf' => $form['ageMf'],
                'bmi' => $form['bmi']
            ];

            $userStats = readUserStats();
            $userStats[$email][$category][] = $activity;

            // Update file.
            updateUserStats($userStats);
        }

        return $errors;
    }
?>