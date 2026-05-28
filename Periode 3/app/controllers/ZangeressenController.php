<?php

class ZangeressenController extends BaseController
{
    private $zangeresModel;

    public function __construct()
    {
        $this->zangeresModel = $this->model('Zangeres');
    }

    public function index($display = 'none', $message = '')
    {
        $result = $this->zangeresModel->getAllZangeressen();

        $data = [
            'title'   => 'Rijkste Zangeressen',
            'display' => $display,
            'message' => $message,
            'result'  => $result
        ];

        $this->view('zangeressen/index', $data);
    }

    public function delete($Id)
    {
        $this->zangeresModel->delete($Id);

        header('Refresh:3; url=' . URLROOT . '/ZangeressenController/index');

        $this->index('flex', 'Record is verwijderd');
    }

    public function create()
    {
        $data = [
            'title'   => 'Nieuwe zangeres toevoegen',
            'display' => 'none',
            'message' => '',
            'errors'  => []
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $errors = [];

            if (empty(trim($_POST['naam']))) {
                $errors['naam'] = 'Voer een naam in';
            } elseif (strlen($_POST['naam']) > 50) {
                $errors['naam'] = 'Naam mag maximaal 50 tekens bevatten';
            }

            if (empty(trim($_POST['nationaliteit']))) {
                $errors['nationaliteit'] = 'Voer een nationaliteit in';
            } elseif (strlen($_POST['nationaliteit']) > 25) {
                $errors['nationaliteit'] = 'Nationaliteit mag maximaal 25 tekens bevatten';
            }

            if (empty($_POST['vermogen'])) {
                $errors['vermogen'] = 'Voer een vermogen in';
            } elseif (!is_numeric($_POST['vermogen']) || $_POST['vermogen'] < 0) {
                $errors['vermogen'] = 'Voer een geldig vermogen in (in miljoenen)';
            }

            if (empty($_POST['geboortedatum'])) {
                $errors['geboortedatum'] = 'Voer een geboortedatum in';
            } elseif (!DateTime::createFromFormat('Y-m-d', $_POST['geboortedatum'])) {
                $errors['geboortedatum'] = 'Voer een geldig datum in (jjjj-mm-dd)';
            }

            if (empty($_POST['aantalalbums'])) {
                $errors['aantalalbums'] = 'Voer het aantal albums in';
            } elseif (!is_numeric($_POST['aantalalbums']) || $_POST['aantalalbums'] < 0 || $_POST['aantalalbums'] > 100) {
                $errors['aantalalbums'] = 'Voer een geldig aantal in (0 - 100)';
            }

            if (!empty($errors)) {
                $data['errors'] = $errors;
            } else {
                $data['display'] = 'flex';
                $data['message'] = 'De gegevens zijn opgeslagen';

                $this->zangeresModel->create($_POST);

                header('Refresh:3; URL=' . URLROOT . '/ZangeressenController/index');
            }
        }

        $this->view('zangeressen/create', $data);
    }

    public function update($id = NULL)
    {
        $data = [
            'title'   => 'Wijzig zangeres',
            'display' => 'none',
            'message' => '',
            'errors'  => []
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $errors = [];

            if (empty(trim($_POST['naam']))) {
                $errors['naam'] = 'Voer een naam in';
            } elseif (strlen($_POST['naam']) > 50) {
                $errors['naam'] = 'Naam mag maximaal 50 tekens bevatten';
            }

            if (empty(trim($_POST['nationaliteit']))) {
                $errors['nationaliteit'] = 'Voer een nationaliteit in';
            } elseif (strlen($_POST['nationaliteit']) > 25) {
                $errors['nationaliteit'] = 'Nationaliteit mag maximaal 25 tekens bevatten';
            }

            if (empty($_POST['vermogen'])) {
                $errors['vermogen'] = 'Voer een vermogen in';
            } elseif (!is_numeric($_POST['vermogen']) || $_POST['vermogen'] < 0) {
                $errors['vermogen'] = 'Voer een geldig vermogen in (in miljoenen)';
            }

            if (empty($_POST['geboortedatum'])) {
                $errors['geboortedatum'] = 'Voer een geboortedatum in';
            } elseif (!DateTime::createFromFormat('Y-m-d', $_POST['geboortedatum'])) {
                $errors['geboortedatum'] = 'Voer een geldig datum in (jjjj-mm-dd)';
            }

            if (empty($_POST['aantalalbums'])) {
                $errors['aantalalbums'] = 'Voer het aantal albums in';
            } elseif (!is_numeric($_POST['aantalalbums']) || $_POST['aantalalbums'] < 0 || $_POST['aantalalbums'] > 100) {
                $errors['aantalalbums'] = 'Voer een geldig aantal in (0 - 100)';
            }

            if (!empty($errors)) {
                $data['errors'] = $errors;
            } else {
                $this->zangeresModel->updateZangeres($_POST);

                $data['display'] = 'flex';
                $data['message'] = 'Het record is succesvol opgeslagen';

                header('Refresh:3; url=' . URLROOT . '/ZangeressenController/index');
            }
        }

        $data['zangeres'] = $this->zangeresModel->getZangeresById($id);

        $this->view('zangeressen/update', $data);
    }
}
