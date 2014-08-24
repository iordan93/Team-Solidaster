Team-Solidaster
===============

Do *NOT* commit / push the file *./idea/workspace.xml*. It is a default IDE settings file and is different for everyone. Commiting it will result in conflicts and severed heads :smile: .

Example usage of ORM:
```
        $db->getAll(array(
            "columns" => array("username", "password"),
            "where" => array(
                0 => "id = 1",
                "or" => "id = 2"
            ),
            "limit" => 5,
            "orderBy" => array(
                "username" => "ASC",
                "password" => "DESC"
            )
        ));
```
