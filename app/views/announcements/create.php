<?php
  require APPROOT . '/views/includes/header.php';
  $id = $_GET['id'];
  var_dump($data);
  
?>
 <form action='<?= URLROOT; ?>announcements/create' method="post" class="form">
                        <div class="row">
                        <div class="col-12">
                            <label class="visually-hidden">Annoucement</label>
                            <input value="<?= $data['announcement']; ?>" type="text" name="inputAnnouncement" class="form-control" id="inputAnnouncement" placeholder="Announcement">
                            <div class="errorForm"><?= $data['announcementError']; ?></div>
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