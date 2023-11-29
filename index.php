<?php
$host = "127.0.0.1";
$username = "root";
$password = "";
$database = "lab_2";

// Підключення до бази даних
$conn = new mysqli($host, $username, $password, $database);

// Перевірка підключення
if ($conn->connect_error) {
    die("Помилка підключення до бази даних: " . $conn->connect_error);
}

// Виведення таблиці `users`
$sql_users = "SELECT * FROM `users`";
$result_users = $conn->query($sql_users);

if ($result_users->num_rows > 0) {
    echo "<h1>Таблиця `users`</h1>";
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Ім'я</th><th>Email</th><thДата реєстрації</th></tr>";
    while ($row = $result_users->fetch_assoc()) {
        echo "<tr><td>" . $row["id"] . "</td><td>" . $row["name"] . "</td><td>" . $row["email"] . "</td><td>" . $row["date_reg"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "Таблиця `users` порожня.";
}

// Виведення таблиці `messages`
$sql_messages = "SELECT * FROM `messages`";
$result_messages = $conn->query($sql_messages);

if ($result_messages->num_rows > 0) {
    echo "<h1>Таблиця `messages`</h1>";
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Текст повідомлення</th><th>ID користувача</th></tr>";
    while ($row = $result_messages->fetch_assoc()) {
        echo "<tr><td>" . $row["message_id"] . "</td><td>" . $row["message_text"] . "</td><td>" . $row["user_id"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "Таблиця `messages` порожня.";
}

// Закриття з'єднання з базою даних
$conn->close();
?>
