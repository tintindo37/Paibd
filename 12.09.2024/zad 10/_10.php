<?php
$servername = "localhost";
$username = "username";
$password = "password";

$conn = new mysqli($servername, $username, $password);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  echo "Connected successfully";
?>

<?php
$conn = mysqli_connect("localhost", "root", "password");
 
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
 
$sql = "SHOW DATABASES";
$result = mysqli_query($conn, $sql);
 
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo $row['Database'] . "<br>";
    }
} else {
    echo "No databases found";
}
?>

<?php
$conn = mysqli_connect("localhost", "root", "password", "my_database");
 
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
 
$sql = "SHOW TABLES";
$result = mysqli_query($conn, $sql);
 
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo $row['Tables_in_my_database'] . "<br>";
    }
} else {
    echo "No tables found";
}
?>

<?php
$conn = mysqli_connect("localhost", "root", "password", "my_database");
 
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
 
$table = "my_table";
$sql = "DESCRIBE $table";
$result = mysqli_query($conn, $sql);
 
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "Field: " . $row['Field'] . " | Type: " . $row['Type'] . "<br>";
    }
} else {
    echo "No structure found for table: $table";
}
?>

<?php
$conn = mysqli_connect("localhost", "root", "password", "my_database");
 
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
 
$sql = "INSERT INTO my_table (name, email) VALUES ('Jan Kowalski', 'test@gmail.com')";
if (mysqli_query($conn, $sql)) {
    echo "Record added successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>

<?php
$conn = mysqli_connect("localhost", "root", "password", "my_database");
 
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
 
$id = 1;
$sql = "DELETE FROM my_table WHERE id = $id";
if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
?>

<?php
$conn = mysqli_connect("localhost", "root", "password", "my_database");
 
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
 
$id = 1;
$sql = "UPDATE my_table SET name='Rafal Nowak', email='testowy@gmail.com' WHERE id=$id";
if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
?>

<?php
$conn = mysqli_connect("localhost", "root", "password", "my_database");
 
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
 
$sql = "SELECT * FROM my_table";
$result = mysqli_query($conn, $sql);
 
if (mysqli_num_rows($result) > 0) {
    echo "<table><tr><th>ID</th><th>Name</th><th>Email</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . $row['id'] . "</td><td>" . $row['name'] . "</td><td>" . $row['email'] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
?>

<?php
$conn = mysqli_connect("localhost", "root", "password", "my_database");
 
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
 
$search = "John";
$sql = "SELECT * FROM my_table WHERE name LIKE '%$search%'";
$result = mysqli_query($conn, $sql);
 
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "ID: " . $row['id'] . " - Name: " . $row['name'] . " - Email: " . $row['email'] . "<br>";
    }
} else {
    echo "No results found";
}
?>

<?php
$conn = mysqli_connect("localhost", "root", "password");
 
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
 
$sql = "SELECT * FROM non_existent_table";
if (!mysqli_query($conn, $sql)) {
    echo "Error: " . mysqli_error($conn);
} else {
    echo "Query executed successfully";
}
?>

<?php
$conn = mysqli_connect("localhost", "root", "password", "my_database");
 
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
 
    $sql = "INSERT INTO my_table (name, email) VALUES ('$name', '$email')";
    if (mysqli_query($conn, $sql)) {
        echo "Record added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

<?php
$conn = mysqli_connect("localhost", "root", "password", "my_database");
 
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = (int)$_POST['id'];
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
 
    $sql = "UPDATE my_table SET name='$name', email='$email' WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
        echo "Record updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

<?php
$conn = mysqli_connect("localhost", "root", "password", "my_database");
 
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
 
$limit = 10;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;
 
$sql = "SELECT * FROM my_table LIMIT $limit OFFSET $offset";
$result = mysqli_query($conn, $sql);
 
echo "<table><tr><th>ID</th><th>Name</th><th>Email</th></tr>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['email']}</td></tr>";
}
echo "</table>";
 
$sql_total = "SELECT COUNT(*) AS total FROM my_table";
$result_total = mysqli_query($conn, $sql_total);
$total_records = mysqli_fetch_assoc($result_total)['total'];
$total_pages = ceil($total_records / $limit);
 
for ($i = 1; $i <= $total_pages; $i++) {
    echo "<a href='?page=$i'>$i</a> ";
}
?>

<?php
$conn = mysqli_connect("localhost", "root", "password", "my_database");
 
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    
    $errors = [];
    
    if (empty($name)) {
        $errors[] = "Name is required";
    }
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }
 
    if (empty($errors)) {
        $name = mysqli_real_escape_string($conn, $name);
        $email = mysqli_real_escape_string($conn, $email);
        
        $sql = "INSERT INTO my_table (name, email) VALUES ('$name', '$email')";
        if (mysqli_query($conn, $sql)) {
            echo "Record added successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    }
}
?>

<?php
$conn = mysqli_connect("localhost", "root", "password", "my_database");
 
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
 
    $stmt = $conn->prepare("INSERT INTO my_table (name, email) VALUES (?, ?)");
    $stmt->bind_param("ss", $name, $email);
 
    if ($stmt->execute()) {
        echo "Record added successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
 
    $stmt->close();
}
?>

<?php
$conn = mysqli_connect("localhost", "root", "password", "my_database");
 
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
 
$sort_column = isset($_GET['sort']) ? $_GET['sort'] : 'id';  // Domyślne sortowanie po ID
$sort_order = isset($_GET['order']) && $_GET['order'] == 'desc' ? 'DESC' : 'ASC';
 
$sql = "SELECT * FROM my_table ORDER BY $sort_column $sort_order";
$result = mysqli_query($conn, $sql);
 
echo "<table><tr>
        <th><a href='?sort=id&order=asc'>ID</a></th>
        <th><a href='?sort=name&order=asc'>Name</a></th>
        <th><a href='?sort=email&order=asc'>Email</a></th>
      </tr>";
 
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['email']}</td></tr>";
}
echo "</table>";
?>

<form method="GET" action="filter_records.php">
    Name: <input type="text" name="name"><br>
    <input type="submit" value="Filter">
</form>
 
<?php
$conn = mysqli_connect("localhost", "root", "password", "my_database");
 
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
 
$where = '';
if (isset($_GET['name']) && !empty($_GET['name'])) {
    $name = mysqli_real_escape_string($conn, $_GET['name']);
    $where = "WHERE name LIKE '%$name%'";
}
 
$sql = "SELECT * FROM my_table $where";
$result = mysqli_query($conn, $sql);
 
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "ID: " . $row['id'] . " - Name: " . $row['name'] . " - Email: " . $row['email'] . "<br>";
    }
} else {
    echo "No records found";
}
?>

<?php
$conn = mysqli_connect("localhost", "root", "password", "my_database");
 
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
 
if (isset($_FILES['csv_file'])) {
    $file = fopen($_FILES['csv_file']['tmp_name'], 'r');
 
    while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
        $name = mysqli_real_escape_string($conn, $data[0]);
        $email = mysqli_real_escape_string($conn, $data[1]);
 
        $sql = "INSERT INTO my_table (name, email) VALUES ('$name', '$email')";
        mysqli_query($conn, $sql);
    }
 
    fclose($file);
    echo "CSV imported successfully";
}
?>

<?php
$conn = mysqli_connect("localhost", "root", "password", "my_database");
 
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
 
$sql = "SELECT * FROM my_table";
$result = mysqli_query($conn, $sql);
 
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="data.csv"');
 
$output = fopen('php://output', 'w');
fputcsv($output, array('ID', 'Name', 'Email'));
 
while ($row = mysqli_fetch_assoc($result)) {
    fputcsv($output, $row);
}
 
fclose($output);
?>

<?php
$conn = mysqli_connect("localhost", "root", "password", "my_database");
 
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
 
    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    if (mysqli_query($conn, $sql)) {
        echo "User registered successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

<?php
$conn = mysqli_connect("localhost", "root", "password", "my_database");
 
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];
 
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);
 
    if ($user && password_verify($password, $user['password'])) {
        echo "Login successful";
    } else {
        echo "Invalid username or password";
    }
}
?>

<form action="add_comment.php" method="POST">
    Comment: <textarea name="comment"></textarea><br>
    <input type="submit" value="Add Comment">
</form>
 
<?php
$conn = mysqli_connect("localhost", "root", "password", "my_database");
 
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
 
$sql = "SELECT * FROM comments ORDER BY created_at DESC";
$result = mysqli_query($conn, $sql);
 
while ($row = mysqli_fetch_assoc($result)) {
    echo "Comment: " . $row['comment'] . " - Posted on: " . $row['created_at'] . "<br>";
}
?>

<?php
$conn = mysqli_connect("localhost", "root", "password", "my_database");
 
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $comment = mysqli_real_escape_string($conn, $_POST['comment']);
    
    $sql = "INSERT INTO comments (comment, created_at) VALUES ('$comment', NOW())";
    if (mysqli_query($conn, $sql)) {
        echo "Comment added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

<?php
$conn = mysqli_connect("localhost", "root", "password", "my_database");
 
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = (int)$_POST['user_id'];
    $content = mysqli_real_escape_string($conn, $_POST['content']);
    
    $sql = "INSERT INTO posts (user_id, content) VALUES ($user_id, '$content')";
    if (mysqli_query($conn, $sql)) {
        echo "Post added successfully";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<?php
$conn = mysqli_connect("localhost", "root", "password", "my_database");
 
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
 
$sql = "SELECT posts.id, users.username, posts.content, posts.created_at
        FROM posts
JOIN users ON posts.user_id = users.id
        ORDER BY posts.created_at DESC";
$result = mysqli_query($conn, $sql);
 
while ($row = mysqli_fetch_assoc($result)) {
    echo "Post by " . $row['username'] . " on " . $row['created_at'] . ":<br>";
    echo $row['content'] . "<br><br>";
}
?>

<?php
$conn = mysqli_connect("localhost", "root", "password", "my_database");
 
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $post_id = (int)$_POST['post_id'];
 
    $sql = "UPDATE posts SET likes = likes + 1 WHERE id = $post_id";
    if (mysqli_query($conn, $sql)) {
        echo "Post liked successfully";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<?php
$conn = mysqli_connect("localhost", "root", "password", "my_database");
 
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
 
$sql = "SELECT posts.id, users.username, posts.content, posts.created_at, posts.likes
        FROM posts
JOIN users ON posts.user_id = users.id
        ORDER BY posts.created_at DESC";
$result = mysqli_query($conn, $sql);
 
while ($row = mysqli_fetch_assoc($result)) {
    echo "Post by " . $row['username'] . " on " . $row['created_at'] . ":<br>";
    echo $row['content'] . "<br>";
    echo "Likes: " . $row['likes'] . "<br><br>";
}
?>

<?php
$conn = mysqli_connect("localhost", "root", "password", "my_database");
 
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    
    $sql = "INSERT INTO users (username) VALUES ('$username')";
    if (mysqli_query($conn, $sql)) {
        echo "User added successfully";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<?php
$conn = mysqli_connect("localhost", "root", "password", "my_database");
 
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $post_id = (int)$_POST['post_id'];
 
    $sql = "DELETE FROM posts WHERE id = $post_id";
    if (mysqli_query($conn, $sql)) {
        echo "Post deleted successfully";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<?php
$conn = mysqli_connect("localhost", "root", "password", "my_database");
 
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
 
$username = isset($_GET['username']) ? mysqli_real_escape_string($conn, $_GET['username']) : '';
$content = isset($_GET['content']) ? mysqli_real_escape_string($conn, $_GET['content']) : '';
$date_from = isset($_GET['date_from']) ? $_GET['date_from'] : '';
$date_to = isset($_GET['date_to']) ? $_GET['date_to'] : '';
 
$where = [];
 
if ($username) {
    $where[] = "users.username LIKE '%$username%'";
}
 
if ($content) {
    $where[] = "posts.content LIKE '%$content%'";
}
 
if ($date_from) {
    $where[] = "posts.created_at >= '$date_from'";
}
 
if ($date_to) {
    $where[] = "posts.created_at <= '$date_to'";
}
 
$where_sql = !empty($where) ? "WHERE " . implode(' AND ', $where) : '';
 
$sql = "SELECT posts.id, users.username, posts.content, posts.created_at
        FROM posts
JOIN users ON posts.user_id = users.id
        $where_sql
        ORDER BY posts.created_at DESC";
 
$result = mysqli_query($conn, $sql);
 
while ($row = mysqli_fetch_assoc($result)) {
    echo "Post by " . $row['username'] . " on " . $row['created_at'] . ":<br>";
    echo $row['content'] . "<br><br>";
}
?>

<?php
function log_activity($user_id, $activity_type) {
    global $conn;
    $sql = "INSERT INTO user_activity (user_id, activity_type) VALUES ($user_id, '$activity_type')";
    mysqli_query($conn, $sql);
}
?>

<?php
$conn = mysqli_connect("localhost", "root", "password", "my_database");
 
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
 
$user_id = 1;
$sql = "SELECT activity_type, activity_time FROM user_activity WHERE user_id = $user_id ORDER BY activity_time DESC";
$result = mysqli_query($conn, $sql);
 
while ($row = mysqli_fetch_assoc($result)) {
    echo $row['activity_type'] . " at " . $row['activity_time'] . "<br>";
}
?>

<?php
$conn = mysqli_connect("localhost", "root", "password", "my_database");
 
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $file = $_FILES['file'];
 
    if ($file['error'] === UPLOAD_ERR_OK) {
        $file_name = basename($file['name']);
        $file_path = 'uploads/' . $file_name;
        
        if (move_uploaded_file($file['tmp_name'], $file_path)) {
            $sql = "INSERT INTO files (file_name, file_path) VALUES ('$file_name', '$file_path')";
            if (mysqli_query($conn, $sql)) {
                echo "File uploaded and saved in database successfully.";
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        } else {
            echo "Failed to move uploaded file.";
        }
    } else {
        echo "File upload error: " . $file['error'];
    }
}
?>

<?php
$conn = mysqli_connect("localhost", "root", "password", "my_database");
 
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
 
mysqli_begin_transaction($conn);
 
try {
    $sql1 = "INSERT INTO users (username) VALUES ('JohnDoe')";
    mysqli_query($conn, $sql1);
 
    $sql2 = "INSERT INTO posts (user_id, content) VALUES (LAST_INSERT_ID(), 'This is a post by JohnDoe')";
    mysqli_query($conn, $sql2);
 
    mysqli_commit($conn);
    echo "Transaction completed successfully.";
} catch (Exception $e) {
    mysqli_rollback($conn);
    echo "Transaction failed: " . $e->getMessage();
}
 
mysqli_close($conn);
?>

<?php
$conn = mysqli_connect("localhost", "root", "password", "my_database");
 
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
 
// Funkcje sesji
function open_session() {
    global $conn;
    return true;
}
 
function close_session() {
    global $conn;
    mysqli_close($conn);
    return true;
}
 
function read_session($session_id) {
    global $conn;
    $sql = "SELECT data FROM sessions WHERE id = '$session_id'";
    $result = mysqli_query($conn, $sql);
    if ($row = mysqli_fetch_assoc($result)) {
        return $row['data'];
    }
    return '';
}
 
function write_session($session_id, $data) {
    global $conn;
    $sql = "REPLACE INTO sessions (id, data, last_access) VALUES ('$session_id', '$data', NOW())";
    mysqli_query($conn, $sql);
    return true;
}
 
function destroy_session($session_id) {
    global $conn;
    $sql = "DELETE FROM sessions WHERE id = '$session_id'";
    mysqli_query($conn, $sql);
    return true;
}
 
function gc_session($max_lifetime) {
    global $conn;
    $sql = "DELETE FROM sessions WHERE last_access < NOW() - INTERVAL $max_lifetime SECOND";
    mysqli_query($conn, $sql);
    return true;
}
 
session_set_save_handler('open_session', 'close_session', 'read_session', 'write_session', 'destroy_session', 'gc_session');
session_start();
 
$_SESSION['user'] = 'JohnDoe';
echo "User stored in session: " . $_SESSION['user'];
?>

<?php
$conn = mysqli_connect("localhost", "root", "password", "my_database");
 
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
 
$sql = "SELECT product_name, SUM(quantity) as total_quantity FROM sales GROUP BY product_name";
$result = mysqli_query($conn, $sql);
 
$sales_data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $sales_data[] = $row;
}
 
mysqli_close($conn);
?>
 
<table border="1">
    <tr>
        <th>Product Name</th>
        <th>Total Quantity Sold</th>
    </tr>
    <?php foreach ($sales_data as $data): ?>
    <tr>
        <td><?php echo $data['product_name']; ?></td>
        <td><?php echo $data['total_quantity']; ?></td>
    </tr>
    <?php endforeach; ?>
</table>