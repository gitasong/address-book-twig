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
        $new_contact = new Contact($_POST['first_name'], $_POST['last_name'], $_POST['street'], $_POST['city'], $_POST['state'], $_POST['zip'], $_POST['phone']);
        $new_contact->save();
        return $app["twig"]->render("contact_created.html.twig", array("new_contact" => $new_contact));
    });

    $app->post("/delete_contacts", function() use ($app) {
        Contact::deleteAll();
        return $app["twig"]->render("contacts_deleted.html.twig");
    });

    $app->post("/edit_contact", function() use ($app) {
        $contacts_list = Contact::getAll();
        $current_contact = $contacts_list[0];
        return $app['twig']->render('edit_contact.html.twig', array('current_contact' => $current_contact));
    });

    $app->post("/update_contact", function() use ($app) {
        $contacts_list = Contact::getAll();
        $current_contact = $contacts_list[0];
        var_dump($current_contact);

        if (!(empty($_POST['new_first_name']))) {
            $current_contact->setFirstName($_POST['new_first_name']);
        }
        if (!(empty($_POST['new_last_name']))) {
            $current_contact->setLastName($_POST['new_last_name']);
        }
        if (!(empty($_POST['new_street']))) {
            $current_contact->setStreet($_POST['new_street']);
        }
        if (!(empty($_POST['new_city']))) {
            $current_contact->setCity($_POST['new_city']);
        }
        if (!(empty($_POST['new_state']))) {
            $current_contact->setState($_POST['new_state']);
        }
        if (!(empty($_POST['new_zip']))) {
            $current_contact->setZip($_POST['new_zip']);
        }
        if (!(empty($_POST['new_phone']))) {
            $current_contact->setPhone($_POST['new_phone']);
        }

        var_dump($current_contact);
        
        return $app['twig']->render('update_confirm.html.twig', array('current_contact' => $current_contact));
    });

    return $app;
?>
