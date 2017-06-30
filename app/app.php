<?php
    date_default_timezone_set('America/Los_Angeles');
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

    $app->get("/", function() use ($app) {
        return $app['twig']->render('contacts.html.twig', array('contacts' => Contact::getAll()));
    });

    $app->post("/create_contact", function() use ($app) {
        $new_contact = new Contact($_POST['first_name'], $_POST['last_name'], $_POST['phone'], $_POST['city'], $_POST['state'], $_POST['zip']);
        $new_contact->save();
        return $app["twig"]->render("contact_created.html.twig", array("new_contact" => $new_contact));
    });

    return $app;
?>
