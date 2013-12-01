<?php
include_once 'User.php';

class LoginModel {
    public $string;

    public function __construct(){
        $this->string= "users";
    }


    function login($redirect) {
            global $pdo;

            if ( !empty ( $_POST ) ) {

                //Clean our form data
                $values = $pdo->clean($_POST);

                //The username and password submitted by the user
                $subname = $values['user_name'];
                $subpass = $values['user_password'];

                echo $subname;

                //The name of the table we want to select data from
                $table = 'users';

                /*
                 * Run our query to get all data from the users table where the user
                 * login matches the submitted login.
                 */
                $sql = "SELECT * FROM $table WHERE user_name = '" . $subname . "'";
                $results = $pdo->select($sql);

                //Kill the script if the submitted username doesn't exit
                if (!$results) {
                    die('Sorry, that username does not exist!');
                }

                //Fetch our results into an associative array
                $results = mysql_fetch_assoc( $results );

                //The hashed password of the stored matching user
                $stopass = $results['user_pass'];

                //Recreate our NONCE used at registration
                $nonce = md5('registration-' . $subname . NONCE_SALT);

                //Rehash the submitted password to see if it matches the stored hash
                $subpass = $pdo->hash_password($subpass, $nonce);

                //Check to see if the submitted password matches the stored password
                if ( $subpass == $stopass ) {

                    //If there's a match, we rehash password to store in a cookie
                    $authnonce = md5('cookie-' . $subname . AUTH_SALT);
                    $authID = $pdo->hash_password($subpass, $authnonce);

                    //Set our authorization cookie
                    setcookie('iaptdbauth[user]', $subname, 0, '', '', '', true);
                    setcookie('iaptdbauth[authID]', $authID, 0, '', '', '', true);

                    //Build our redirect
                    $url = "http" . ((!empty($_SERVER['HTTPS'])) ? "s" : "") . "://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
                    $redirect = str_replace('login.php', $redirect, $url);

                    //Redirect to the home page
                    header("Location: $redirect");
                    exit;
                } else {
                    return 'invalid';
                }
            } else {
                return 'empty';
            }
        }

        function logout() {
            //Expire our auth coookie to log the user out
            $idout = setcookie('iaptdbauth[authID]', '', -3600, '', '', '', true);
            $userout = setcookie('iaptdbauth[user]', '', -3600, '', '', '', true);

            if ( $idout == true && $userout == true ) {
                return true;
            } else {
                return false;
            }
        }

        function checkLogin() {
            global $pdo;

            //Grab our authorization cookie array
            $cookie = $_COOKIE['iaptdbauth'];

            //Set our user and authID variables
            $user = $cookie['user'];
            $authID = $cookie['authID'];

            /*
             * If the cookie values are empty, we redirect to login right away;
             * otherwise, we run the login check.
             */
            if ( !empty ( $cookie ) ) {

                //Query the database for the selected user
                $table = 'users';
                $sql = "SELECT * FROM $table WHERE user_name = '" . $user . "'";
                $results = $pdo->select($sql);

                //Kill the script if the submitted username doesn't exit
                if (!$results) {
                    die('Sorry, that username does not exist!');
                }

                //Fetch our results into an associative array
                $results = mysql_fetch_assoc( $results );

                //The registration date of the stored matching user
                $storeg = $results['user_registered'];

                //The hashed password of the stored matching user
                $stopass = $results['user_pass'];

                //Rehash password to see if it matches the value stored in the cookie
                $authnonce = md5('cookie-' . $user . $storeg . AUTH_SALT);
                $stopass = $pdo->hash_password($stopass, $authnonce);

                if ( $stopass == $authID ) {
                    $results = true;
                } else {
                    $results = false;
                }
            } else {
                //Build our redirect
                $url = "http" . ((!empty($_SERVER['HTTPS'])) ? "s" : "") . "://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
                $redirect = str_replace('index.php', 'login.php', $url);

                //Redirect to the home page
                header("Location: $redirect?msg=login");
                exit;
            }

            return $results;
        }

}

 ?>