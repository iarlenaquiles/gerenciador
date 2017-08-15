<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="container">
        <div class="card card-container">
            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card">Area Restrita</p>
            <form class="form-signin" method="post" action="<?=base_url()?>">
                <span id="reauth-email" class="reauth-email"></span>
                <input type="text" id="inputEmail" name="email" class="form-control" placeholder="CPF de acesso" required autofocus autocomplete="off"/>
                <input type="password" id="inputPassword" name="senha" class="form-control" placeholder="Senha" required>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Entrar</button>
            </form><!-- /form -->
        </div><!-- /card-container -->
    </div><!-- /container -->
</div>