<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Contact.php";

    session_start();

    if (empty($_SESSION['list_of_contacts'])) {
        $_SESSION['list_of_contacts'] = array();
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
        $contact = new Contact($_POST['first_name'], $_POST['last_name'], new Address($_POST['street'], $_POST['city'], $_POST['state'], $_POST['zip']));
        $contact->save();
        return $app['twig']->render('created_contact.html.twig', array('newcontact' => $contact));
    });
    //delete all contacts page
    $app->post("/delete_contacts", function() use($app) {
        Contact::deleteAll();
        return $app['twig']->render('delete_contacts.html.twig');
    });
    return $app;
 ?>
