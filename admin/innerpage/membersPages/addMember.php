<div class="add-member text-center">
    <div class="container">
        <h1 class="content ">Add New Member</h1>
        <form class="content" method="POST" action="?page=Insert">
            <ul>
                <li>
                    <input class="input" type="text" name="username" placeholder="Username" autocomplete="off"
                           required="required">
                </li>
                <li>
                    <div class="div-item">
                        <label>
                            <input class="password input" type="password" name="password" placeholder="Password"
                                   autocomplete="off"
                                   required="required">

                        </label>
                        <p class="show-pass">Show</p>
                        <!--<i class="show-pass fa fa-eye fa-2x"></i>-->

                    </div>
                </li>
                <li>
                    <input class="input" type="email" name="email" placeholder="Email" autocomplete="off"
                           required="required">
                </li>
                <li>
                    <input class="input" type="text" name="fullname" placeholder="Full Name" autocomplete="off"
                           required="required">
                </li>
                <li>
                    <input class="button" type="submit" name="save" value="Save">
                </li>
            </ul>
        </form>
    </div>
</div>





