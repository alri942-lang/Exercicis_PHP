# Miniaplicació MVC Videojocs

Aquest projecte és una miniaplicació MVC en PHP que gestiona una llista de videojocs emmagatzemats en una base de dades MySQL mitjançant PDO. Implementa les quatre operacions CRUD (Crear, Llegir, Actualitzar, Eliminar) i utilitza pràctiques bàsiques de seguretat com prepared statements i escapament amb `htmlspecialchars()` a les vistes.

## Estructura
- `config/` — configuració de la connexió a la base de dades (PDO).
- `models/Videojoc.php` — classe que encapsula totes les operacions SQL sobre la taula `videojocs` (prepared statements).
- `controllers/VideojocController.php` — gestor d'accions (index, create, store, edit, update, delete). S'encarrega de validar entrades, fer castings de tipus i aplicar PRG.
- `views/` — vistes separades: `layout.php` (plantilla), `list.php`, `create.php`, `edit.php`.
- `index.php` — entrada única que despacha l'acció al controlador.

## PRG 

Les operacions POST → redirigeixen a GET.

##Captures

Create
<img width="658" height="127" alt="Create" src="https://github.com/user-attachments/assets/4bf53880-0d15-4047-8b86-a5b5a95eb42a" />

Delete
<img width="618" height="76" alt="Delete" src="https://github.com/user-attachments/assets/0ad273a5-66c5-450c-ac2e-05bfcf89407d" />

Index
<img width="470" height="101" alt="Index" src="https://github.com/user-attachments/assets/c69ef202-bb57-4abd-8113-d72f743934e5" />

Update
<img width="674" height="125" alt="Update" src="https://github.com/user-attachments/assets/ecf4b371-606a-428b-a008-06e21aa51e00" />
