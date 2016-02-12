<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Contact.php";
    require_once __DIR__."/../src/Address.php";

    session_start();

    if (empty($_SESSION['list_of_contacts'])) {
        $_SESSION['list_of_contacts'] = array();
    }
    /**Matching Contacts Array**/
    if(empty($_SESSION['matching_contacts'])) {
        $_SESSION['matching_contacts'] = array();
    }

    $app = new Silex\Application();
    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));
    //home page
    $app->get("/", function() use ($app) {
        return $app['twig']->render('address_book.html.twig', array('contacts' => Contact::getAll()));
    });
    //created a contact page
    $app->post("/create_contact", function() use ($app) {
        $contact = new Contact($_POST['first_name'], $_POST['last_name'], $_POST['image_path'], new Address($_POST['street'], $_POST['city'], $_POST['state'], $_POST['zip']), $_POST['phone'], $_POST['email']);
        $contact->save();
        return $app['twig']->render('created_contact.html.twig', array('newcontact' => $contact));
    });
    //view results of search page
    $app->get("/results", function() use($app) {
        $user_contact = strtolower($_GET['user_contact']);
        $contacts = $_SESSION['list_of_contacts'];
        $contacts_match = $_SESSION['matching_contacts'];
        foreach ($contacts as $contact) {
            if($user_contact == strtolower($contact->getFirstName())) {
                array_push($contacts_match, $contact);
            }
        }
        return $app['twig']->render('matching_contacts.html.twig', array('matching_contacts' => $contacts_match));
    });
    //delete all contacts page
    $app->post("/delete_contacts", function() use($app) {
        Contact::deleteAll();
        return $app['twig']->render('delete_contacts.html.twig');
    });
    return $app;
 ?>
