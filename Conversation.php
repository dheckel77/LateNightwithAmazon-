<?php
 
    // start the session
    session_start();
 
    // get the session varible if it exists
    $counter = $_SESSION['counter'];
 
    // if it doesnt, set the default
    if(!strlen($counter)) {
        $counter = 0;
    }
 
    // increment it
    $counter++;
 
    // save it
    $_SESSION['counter'] = $counter;
 
    // make an associative array of senders we know, indexed by phone number
     $people = array(
        "+14403641464" => "Jami",
    );

     $link = "http://amzn.to/1j06jS6";
    // if the sender is known, then greet them by name
    // otherwise, consider them just another monkey
    if(!$name = $people[$_REQUEST['From']]) {
        if ($counter == 1)
        {
            $message = "Sup friend! Welcome to Late Night with Amazon. I'm assuming youre here to get late night texts of random stuff.";
        }
        else 
        {
            $message = "Yo fam. You know you need this: $link";
        }
    }
    
    else
    {
        $message = "Welcome back!";
    }

    // output the counter response
    header("content-type: text/xml");
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
?>
<Response>
    <Sms><?php echo $message ?></Sms>
</Response>
