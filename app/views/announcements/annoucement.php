<?php
  require APPROOT . '/views/includes/header.php';
var_dump($data)
?>
 <form action='<?= URLROOT; ?>\Announcements\updateannoucement?id=<?= $data->Instructor; ?>' method="POST" class="form">
                        <div class="row">
                        <div class="col-12">
                            <label class="visually-hidden">Annoucement</label>
                            <input value="<?= $data->Announcement; ?>" type="inputAnnouncement" name="inputAnnouncement" class="form-control" id="inputAnnouncement" placeholder="Announcement">
                        </div>
                        <br></br>   
                        <div class="row">
                            <div class="col-12">
                                <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                    </p>


<?php 
  require APPROOT . '/views/includes/footer.php';
?>