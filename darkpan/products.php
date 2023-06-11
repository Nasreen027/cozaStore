<?php
include('query.php');
include('header.php');
?>
<!-- Table Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Products Table</h6>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Image</th>
                            <th scope="col">Category</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = $pdo->query('select * from products');
                        $result = $query->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($result as $data) {
                            ?>
                        <tr>
                            <td scope="row">
                                    <?php echo $data['pId'] ?>
                            </td>
                            <td>
                                    <?php echo $data['name'] ?>
                            </td>
                            <td>
                                    <?php echo $data['price'] ?>
                            </td>
                            <td>
                                    <?php echo $data['qty'] ?>
                            </td>
                            <td><img style="height:80px;width:80px;object-fit:contain"
                                    src='img/<?= $data['proImage'] ?>'></td>
                                    <td>
                                    <?php echo $data['category'] ?>
                            </td>
                            </tr>

                            <?php
                        }
                        ?>
                    </tbody>
                </table>
                <button class="btn btn-sm btn-primary" data-bs-toggle='modal' data-bs-target='#myModal'>Add
                    Product</button>
                <div class="modal" id="myModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add Product</h5>
                                    <button data-bs-dismiss='modal' type='button' class="btn-close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <input type="text" name='prName' class="form-control"
                                            placeholder='Enter product name here'>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name='prPrice' class="form-control"
                                            placeholder='Enter product price here'>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name='prQty' class="form-control"
                                            placeholder='Enter product quantity here'>
                                    </div>
                                    <div class="form-group">
                                        <input type="file" name='prImage' class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <select name="selectCtg" id="">
                                            <option value="">Choose category</option>
                                            <?php
                                            $query = $pdo->prepare('select * from category');
                                            $result = $query->fetchAll(PDO::FETCH_ASSOC);
                                            echo $result;
                                            foreach ($result as $ctg) {
                                                ?>
                                                <option value="<?php echo $ctg['ctgName'] ?>"><?php echo $ctg['ctgName'] ?></option>
                                                <?
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" name="addProdBtn">Add</button>
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