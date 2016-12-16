<h1>Login</h1>
<form action = "index.php?accion=login" method = "post" name = "login_form" style="text-align: center">
    <table>
        
    </table>
    Usuario: <input type = "text" name = "usuario" />
    <br/>
    Password: <input type = "password"
                     name = "password"
                     id = "password"/>
    <br/>
    <input type = "button"
           value = "Login"
           onclick = "formhash(this.form, this.form.password);" />
</form>