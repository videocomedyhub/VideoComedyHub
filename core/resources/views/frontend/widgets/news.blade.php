<!--news letter-->
<div class="large-12 medium-7 medium-centered columns">
    <div class="widgetBox">
        <div class="newsLetter">
            <h3>Newsletter Sign up</h3>
            <p>Subscribe to get exclusive videos</p>
            <form method="post">
                {{ csrf_field() }}
                <div class="input-group">
                    <input class="input-group-field" type="email" placeholder="Enter your email addres">
                    <div class="input-group-button">
                        <input type="submit" class="button" value="Signup">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!--End news letter-->