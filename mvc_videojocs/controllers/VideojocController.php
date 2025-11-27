<?php
require_once __DIR__."/../models/Videojoc.php";

class VideojocController {

    private function render(string $view, array $data = []){
        
        extract($data);
        
        ob_start();
        require __DIR__ . "/../views/{$view}.php";
        $content = ob_get_clean();
        
        $title = $title ?? "Videojocs MVC";
        require __DIR__ . "/../views/layout.php";
    }

    public function index() {
        $model = new Videojoc();
        $videojocs = $model->getAll();
        $this->render('list', ['videojocs' => $videojocs]);
    }

    public function create(){
        $this->render('create');
    }

    public function store(){
        session_start();

        $nom = trim($_POST['nom'] ?? '');
        $plataforma = trim($_POST['plataforma'] ?? '');
        $any = isset($_POST['any']) && $_POST['any'] !== '' ? (int)$_POST['any'] : null;
        $preu = isset($_POST['preu']) && $_POST['preu'] !== '' ? (float)$_POST['preu'] : null;

        $errors = [];
        if ($nom === '') $errors[] = 'El nom és obligatori.';
        if ($any !== null && ($any < 1950 || $any > (int)date('Y')+5)) $errors[] = 'Any invàlid.';
        if ($preu !== null && $preu < 0) $errors[] = 'Preu invàlid.';

        if (!empty($errors)) {
            
            $this->render('create', ['errors' => $errors, 'old' => $_POST]);
            return;
        }

        $model = new Videojoc();
        $model->create($nom, $plataforma, $any, $preu);
        $_SESSION['flash'] = 'Videojoc afegit correctament.';
        header("Location: index.php");
        exit;
    }

    public function edit(){
        $model = new Videojoc();
        $videojoc = $model->getById($_GET['id']);
        $this->render('edit', ['videojoc' => $videojoc]);
    }

    public function update(){
        session_start();

        $id = (int)($_POST['id'] ?? 0);
        $nom = trim($_POST['nom'] ?? '');
        $plataforma = trim($_POST['plataforma'] ?? '');
        $any = isset($_POST['any']) && $_POST['any'] !== '' ? (int)$_POST['any'] : null;
        $preu = isset($_POST['preu']) && $_POST['preu'] !== '' ? (float)$_POST['preu'] : null;

        $errors = [];
        if ($nom === '') $errors[] = 'El nom és obligatori.';
        if ($any !== null && ($any < 1950 || $any > (int)date('Y')+5)) $errors[] = 'Any invàlid.';
        if ($preu !== null && $preu < 0) $errors[] = 'Preu invàlid.';

        if (!empty($errors)) {

            $videojoc = ['id' => $id, 'nom' => $nom, 'plataforma' => $plataforma, 'any' => $any, 'preu' => $preu];
            $this->render('edit', ['errors' => $errors, 'videojoc' => $videojoc]);
            return;
        }

        $model = new Videojoc();
        $model->update($id, $nom, $plataforma, $any, $preu);
        $_SESSION['flash'] = 'Videojoc actualitzat.';
        header("Location: index.php");
        exit;
    }

    public function delete(){
        session_start();
        $model = new Videojoc();
        $model->delete($_GET['id']);
        $_SESSION['flash'] = 'Videojoc eliminat.';
        header("Location: index.php");
        exit;
    }
}