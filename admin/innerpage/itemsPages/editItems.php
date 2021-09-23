<div id="edit-item" class="modal">
    <div class="modal-dialog text-center">
        <div class="modal-content">
            <h4 class="modal-header">Edit Item</h4>
            <p id="#message-item"></p>
            <div class="modal-body">
                <form class="content" method="POST">
                    <ul>
                        <li>
                            <input class="input" type="hidden" name="itemID" id="itemID">
                        </li>
                        <li>
                            <label>
                                <p class="text-start">Name</p>
                                <input class="input"
                                       type="text"
                                       name="name"
                                       id="itemName"
                                       placeholder="Name Of The Category"
                                       autocomplete="off"
                                       required="required">
                            </label>
                        </li>
                        <li>
                            <label>
                                <p class="text-start">Description</p>
                                <input class="input"
                                       type="text"
                                       name="description"
                                       id="itemDescription"
                                       placeholder="Description"
                                       autocomplete="off"
                                       required="required">
                            </label>
                        </li>
                        <li>
                            <label>
                                <p class="text-start">Price</p>
                                <input class="input"
                                       type="text"
                                       name="price"
                                       id="itemPrice"
                                       placeholder="Number Of The Arrange The Categories"
                                       autocomplete="off"
                                       required="required">
                            </label>
                        </li>
                        <li>
                            <label>
                                <p class="text-start">Date</p>
                                <input class="input"
                                       type="text"
                                       name="date"
                                       id="itemDate"
                                       placeholder="Number Of The Arrange The Categories"
                                       autocomplete="off"
                                       required="required">
                            </label>
                        </li>
                        <li>
                            <label>
                                <p class="text-start">Country</p>
                                <input class="input"
                                       type="text"
                                       name="country"
                                       id="itemCountry"
                                       placeholder="Number Of The Arrange The Categories"
                                       autocomplete="off"
                                       required="required">
                            </label>
                        </li>
                        <li>
                            <label>
                                <p class="text-start">Rating</p>
                                <input class="input"
                                       type="text"
                                       name="rating"
                                       id="itemRating"
                                       placeholder="Number Of The Arrange The Categories"
                                       autocomplete="off"
                                       required="required">
                            </label>
                        </li>
                        <li>
                            <label>
                                <p class="text-start">CatID</p>
                                <input class="input"
                                       type="text"
                                       name="catID"
                                       id="itemCatID"
                                       placeholder="Number Of The Arrange The Categories"
                                       autocomplete="off"
                                       required="required">
                            </label>
                        </li>
                        <li>
                            <label>
                                <p class="text-start">MemberID</p>
                                <input class="input"
                                       type="text"
                                       name="memberID"
                                       id="itemMemberID"
                                       placeholder="Number Of The Arrange The Categories"
                                       autocomplete="off"
                                       required="required">
                            </label>
                        </li>
                    </ul>
                </form>
            </div>
            <div class="modal-footer">
                <button id="update-item" class="btn btn-primary" type="button">Update</button>
                <button id="cancel" class="btn btn-danger" type="button" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>





