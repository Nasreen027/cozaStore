<?php
include('header.php');
    ?>
            <!-- Table Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Category Table</h6>

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Image</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = $pdo->query('select * from category');
                                    $result = $query->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($result as $data) {
                                        ?>
                                    <tr>
                                        <th scope="row">
                                                <?php echo $data['id'] ?>
                                        </th>
                                        <td>
                                                <?php echo $data['ctgName'] ?>
                                        </td>
                                        <td><img style="height:80px;width:80px;object-fit:contain" src='img/<?= $data['ctgImage'] ?>'></td>
                                        </tr>

                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <button class="btn btn-sm btn-primary" data-bs-toggle='modal' data-bs-target='#myModal'>Add
                                Category</button>
                            <div class="modal" id="myModal">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Add Category</h5>
                                                <button data-bs-dismiss='modal' type='button'
                                                    class="btn-close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <input type="text" name='ctgName' class="form-control"
                                                        placeholder='Enter category name here'>
                                                </div>
                                                <div class="form-group">
                                                    <input type="file" name='ctgImage' class="form-control">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" name="addCtgBtn">Add</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        <!-- Table End -->
        <?php
        include('footer.php');
        ?>