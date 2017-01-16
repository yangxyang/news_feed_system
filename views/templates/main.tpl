<h2 class="text-center">Mini Twitter</h2>
    
    <form id="messageform" method="post" action="#">
        <div class="form-group">
            <div class="row">
                <input type='hidden' name='action' value='new_post' />
                <div class="form-group form-group-lg">
                    <input class="form-control input-lg" name="message" type="text" required>
                </div>
                <button id="postbutton" type="submit" class="btn btn-success">Post</button>
            </div> 
        </div>
    </form>
    
    <hr>
    <div class="row">
        <label for="timeline" class="col-sm-2 control-label">Timeline</label>
        <br />
        <ul class="list-group" id="timeline">
            <!-- timeline -->
        </ul>
    </div>

    <!-- javascript -->
    <script src="js/jquery-3.1.1.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/newsfeed.js" type="text/javascript"></script>
    
</body>
</html>