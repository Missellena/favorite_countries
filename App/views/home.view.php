<?php require 'App/views/partials/header.php'; ?>
<?php require 'App/views/partials/navigation.php'; ?>

<!-- Shows the error on the page -->
    <?php 
    if(isset($_GET['result']) && ($_GET['result'] !== '')) {
        ?>
        <div class="alert alert-danger" role="alert"><?php echo $_GET['result'] ?></div>
        <?php
    };
    ?>
<div class="row mt-5 mb-4">
    <div class="col-md-10 offset-md-1">
        <table id="table" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Icon</th>
                <th>Country Name</th>
                <th>Region</th>
                <th>Population</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- Checks if API returned results and also if the user is on home or favourites page -->
            <?php 
            if(!isset($response['message']) || $response['message'] !== 'Page Not Found') {
                foreach($response as $country) 
                {
                    if (isset($favourites)) {
                        foreach ($favourites as $favourite) 
                        {
                            if ($country['name']['common'] == $favourite['country']) {
                                ?>
                            <tr>
                                <td><img class=" w-25" src="<?php echo $country['flags']['png']?>"/></td>
                                <td><?php echo $country['name']['common'] ?></td>
                                <td><?php echo $country['region'] ?></td>
                                <td><?php echo $country['population'] ?></td>
                                <td><a href="/remove?name=<?php echo $country['name']['common']?>">Remove from favourites</a></td>
                            </tr>
                                <?php
                                foreach ($comments as $comment)
                                {
                                    if ($favourite['country'] == $comment['country']) {
                                        ?>
                                    <tr>
                                        <td colspan="5">
                                            <b>Description: </b> <i><?php echo $comment['comment']?></i> <b>Created at:</b> <i><?php echo $comment['created_at']?> </i>
                                        </td>
                                    </tr>
                                        <?php
                                    }
                                }
                                ?>
                            <tr>
                                <td colspan="2">
                                <form action="/comment" method="POST" class="d-flex">
                                    <button class="btn-sm btn-secondary" type="submit">Comment</button>
                                    <input type="hidden" name="id" value="<?php echo $favourite['id'] ?>" class="form-control">
                                    <input type="text" name="comment" class="form-control">
                                </form>
                                </td>
                            </tr>
                                <?php 
                            }
                        }
                    } 
                    else 
                    {
                        ?>
                <tr>
                    <td><img class=" w-25" src="<?php echo $country['flags']['png']?>"/></td>
                    <td><?php echo $country['name']['common'] ?></td>
                    <td><?php echo $country['region'] ?></td>
                    <td><?php echo $country['population'] ?></td>
                    <td><a href="/add?name=<?php echo $country['name']['common']?>">Add to favourites</a></td>
                </tr>
                        <?php
                    }
                }
            };
            ?>
        </tbody>
        </table>
    </div>
</div>

<?php require 'App/views/partials/footer.php'; ?>