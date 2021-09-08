<div class="add-member text-center">
    <div class="container">
        <h1 class="content ">Add New Categories</h1>
        <form class="content" method="POST" action="?page=Insert">
            <ul>
                <li>
                    <input class="input" type="text" name="name" placeholder="Name Of The Category" autocomplete="off"
                           required="required">
                </li>
                <li>
                    <input class="input" type="text" name="description" placeholder="Description"
                           autocomplete="off"
                           required="required">
                </li>
                <li>
                    <input class="input" type="text" name="ordering"
                           placeholder="Number Of The Arrange The Categories"
                           autocomplete="off"
                           required="required">
                </li>
                <li>
                    <div class="row-div input row">
                        <p class="col">Visible</p>
                        <div class="col">
                            <input id="vis-yes" type="radio" name="visibility" value="0" checked>
                            <label for="vis-yes">Yes</label>
                        </div>
                        <div class="col">
                            <input id="vis-no" type="radio" name="visibility" value="1">
                            <label for="vis-no">No</label>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="row-div input row">
                        <p class="col">Allow Commenting</p>
                        <div class="col">
                            <input id="com-yes" type="radio" name="commenting" value="0" checked>
                            <label for="com-yes">Yes</label>
                        </div>
                        <div class="col">
                            <input id="com-no" type="radio" name="commenting" value="1">
                            <label for="com-no">No</label>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="row-div input row">
                        <p class="col">Allow Ads</p>
                        <div class="col">
                            <input id="ads-yes" type="radio" name="ads" value="0" checked>
                            <label for="ads-yes">Yes</label>
                        </div>
                        <div class="col">
                            <input id="ads-no" type="radio" name="ads" value="1">
                            <label for="ads-no">No</label>
                        </div>
                    </div>
                </li>
                <li>
                    <input class="button" type="submit" name="save" value="Add">
                </li>
            </ul>
        </form>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
</div>





