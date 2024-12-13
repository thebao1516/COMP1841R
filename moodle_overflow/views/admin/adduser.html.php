<h1>Create a new user</h1>
<div class="container">

    <form action="" method="POST" style="padding: 30px 15px;">
        <label for="is_admin">Admin: </label>
        <label>
            <input type="checkbox" name="is_admin">
            <span class="checkable"></span>
        </label>
        <br>
        <label for="firstname">First name: </label>
        <input type="text" name="firstname" required>
        <br>
        <label for="lastname">Last name: </label>
        <input type="text" name="lastname" required>
        <br>
        <label for="email">Email: </label>
        <input type="email" name="email" id="" required>
        <br>
        <label for="password">Password: </label>
        <input type="password" name="password" id="" minlength="8" required>
        <br>
        <input type="submit" value="Submit" name="submit">
    </form>  
</div>