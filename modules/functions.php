<?php
function getPiece($id)
{
    global $pdo;
    $query = $pdo->prepare('SELECT * FROM clothing WHERE id= :id');
    $query->bindParam('id', $id);
    $query->execute();
    return $query->fetch(PDO::FETCH_ASSOC);
}

function ViewArray(array $array, int $level = 0): void
{
    // Begin met een table voor een nette weergave
    echo str_repeat("&nbsp;", $level * 4) . "<table border='1' style='border-collapse: collapse; margin: 5px;'>";

    foreach ($array as $key => $value) {
        echo "<tr>";
        // Toon de key in een aparte cel
        echo "<td style='padding: 5px;'><strong>" . htmlspecialchars((string) $key) . "</strong></td>";

        if (is_array($value)) {
            // Roep de functie recursief aan als het een array is
            echo "<td>";
            ViewArray($value, $level + 1);
            echo "</td>";
        } else {
            // Toon de waarde direct als het geen array is
            echo "<td style='padding: 5px;'>" . htmlspecialchars((string) $value) . "</td>";
        }

        echo "</tr>";
    }

    echo "</table>";
}
?>