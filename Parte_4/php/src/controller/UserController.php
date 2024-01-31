<?php

class UserController
{
    public function insertUserData($conn, $username, $hashed_password, $email)
    {
        $sql = "INSERT INTO User (username, password, email) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $username, $hashed_password, $email);
        $stmt->execute();

        // Get the ID of the newly inserted user
        $user_id = $stmt->insert_id;

        return $user_id;
    }

    public function getUserByUsername($conn, $username) {
        // Use the correct table name, which is 'User' in your case
        $query = "SELECT * FROM User WHERE username = ?";

        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }
}
