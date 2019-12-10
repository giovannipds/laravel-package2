<!-- File: packages/Acme/PageReview/resources/views/section.blade.php -->
<div class="container" id="review">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h4>Add review</h4>
                    <div class="form-group">
                        <input type="text" v-model="username" class="form-control col-4" placeholder="Enter your username">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" v-model="comment" placeholder="Enter your review"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="button" v-on:click="addPageReview" v-bind:disabled="isDisabled" class="btn btn-success" value="Add Review" />
                    </div>
                    <hr />
                    <h4>Display reviews</h4>
                    <div v-for="review in reviews">
                        <strong>@{{ review.username }}</strong>
                        <p>@{{ review.comment }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
