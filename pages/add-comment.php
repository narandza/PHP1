<form action="models/post-comment.php?id=<?=$id?>" method="post">
                          <div class="form-group">
                              <label for="name">Name:</label>
                              <input  disabled type="text" name="Name" class="form-control"id="name" value="<?=$_SESSION['userName']?>">
                          </div>
                          <div class="form-group">
                              <label for="postArea">Comment: </label>
                             <textarea class="form-control"name="Comment" id="comment" cols="30" rows="5"></textarea>
                          </div>
                          <br>
                          <input class ="btn btn-primary" type="submit" value="Submit"name="Submit">
                          <br>
                      </form>