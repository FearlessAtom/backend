<?php

class NotesController
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    function processRequest(string $method, ?string $id): void
    {
        if (!is_null($id))
        {
            $this->processResourceRequest($method, $id);
        }

        else 
        {
            $this->processCollectionRequest($method);
        }
    }

    function processResourceRequest(string $method, int $id): void
    {
        switch ($method)
        {
            case "GET":
            {

                break;
            }

            case "DELETE":
            {
                $prepare = $this->pdo->prepare("delete from notes where note_id = :id");
                $prepare->execute(["id" => $id]);
                echo $prepare->fetch(PDO::FETCH_ASSOC);
            }

            case "PATCH":
            {
                $data = json_decode(file_get_contents("php://input"));

                $title = $data->title ?? null;
                $content = $data->content ?? null;

                if ($title != null)
                {
                    $prepare = $this->pdo->prepare("update notes set title = :title where note_id = :id");
                    $prepare->execute(["title" => $title, "id" => $id]);
                }

                if ($content != null)
                {
                    $prepare = $this->pdo->prepare("update notes set content = :content where note_id = :id");
                    $prepare->execute(["content" => $content, "id" => $id]);
                }
            }
        }
    }

    function processCollectionRequest(string $method): void
    {
        switch ($method)
        {
            case "GET":
            {
                $query = $this->pdo->query("select * from notes");
                echo json_encode($query->fetchAll());

                break;
            }

            case "POST":
            {
                $data = json_decode(file_get_contents("php://input"));

                $title = $data->title;
                $content = $data->content;

                $prepare = $this->pdo->prepare("insert into notes (title, content) values (:title, :content)");

                $prepare->execute(["title" => $title, "content" => $content]);
            }
        }
    }
}
