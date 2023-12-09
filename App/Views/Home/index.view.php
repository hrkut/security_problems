<div class="container-fluid">
    <div class="row">
        <div class="col mt-5">
            <div class="text-center">
                <h2>Vaííčko MVC FW</h2>
                <img src="public/images/vaiicko_logo.png">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="text-center mt-5">
                    XSS útok 1.typu:<br>
                    <a href="http://localhost/public/security_problems/xss1.html?meno=<script>alert('Toto je XSS útok!')</script>">http://localhost/public/security_problems/xss1.html?meno=&lt;script&gt;alert('Toto je XSS útok!')&lt;/script&gt;</a>
                </div>
                <div class="text-center mt-5">
                    XSS útok 2.typu<br>
                    <a href="http://localhost/public/security_problems/xss2.php?meno=<script>alert('Toto je XSS útok!')</script>">http://localhost/public/security_problems/xss2.php?meno=&lt;script&gt;alert('Toto je XSS útok!')&lt;/script&gt;</a>
                </div>
                <div class="text-center mt-5">
                    XSS útok 3.typu<br>
                    Pozri súbor App/Views/Posts/index.view.php, riadok 26
                </div>
                <div class="text-center mt-5">
                    SQL injection útok<br>
                    Pozri súbor App/Auth/AnyLoginAuthenticator.php, riadok 31
                </div>
            </div>
        </div>
    </div>
</div>
