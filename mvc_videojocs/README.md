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