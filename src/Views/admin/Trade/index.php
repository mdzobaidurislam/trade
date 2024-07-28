<?php include_once __DIR__.'/../header.php'; ?>

<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <h3>Manage trade</h3>
    </div>
    <div class="col-lg-12">
    <form class=" mb-3">

<div class="row align-items-center ">
    <div class="col-lg-1">
        
        <select class="form-control my-1 mr-sm-2" id="paginationLimit" name="limit">
            
            <option value="10" <?php if ($limit == 10) echo 'selected'; ?>>10</option>
            <option value="20" <?php if ($limit == 20) echo 'selected'; ?>>20</option>
            <option value="30" <?php if ($limit == 30) echo 'selected'; ?>>30</option>
            <option value="50" <?php if ($limit == 50) echo 'selected'; ?>>50</option>
            <option value="100" <?php if ($limit == 100) echo 'selected'; ?>>100</option>
            <option value="150" <?php if ($limit == 150) echo 'selected'; ?>>150</option>
            <option value="200" <?php if ($limit == 200) echo 'selected'; ?>>200</option>
            <option value="210" <?php if ($limit == 210) echo 'selected'; ?>>210</option>
            <option value="220" <?php if ($limit == 220) echo 'selected'; ?>>220</option>
            <option value="230" <?php if ($limit == 230) echo 'selected'; ?>>230</option>
            <option value="240" <?php if ($limit == 240) echo 'selected'; ?>>240</option>
            <option value="250" <?php if ($limit == 250) echo 'selected'; ?>>250</option>
            <!-- Add more options as needed -->
        </select>
    </div>
    <div class="col-lg-3">

        <input type="text" class="form-control my-1 mr-sm-2  " id="search" name="search" placeholder="Search..." value="<?php echo htmlspecialchars($search); ?>">
    </div>
    <div class="col-lg-2">

        <button type="submit" class="btn btn-primary my-1 mr-sm-2">Search</button>
    </div>
</div>
</form>
    </div>
    <div class="table-responsive">
    <table class="table table-hover  w-100 display  text-nowrap  table-bordered  ">
        <thead>
            <tr>
                <th>Edit</th>
                <th>ID</th>
                <th>Picture</th>
                <th>License no</th>
                <th>Ward</th>
                <th>Name</th>
                <th>Father name</th>
                <th>Mother name</th>
                <th>Village</th> 
                <th>Post office</th> 
                <th>Thana</th> 
                <th>District</th> 
                <th>P. village</th> 
                <th>P. thana</th> 
                <th>P. village</th> 
                <th>P. district</th> 
                <th>Nid number</th> 
                <th>Tin number</th> 
                <th>Business name</th> 
                <th>B. address</th> 
                <th>B. type</th> 
                <th>Trade license type</th> 
                <th>Trade license fee</th> 
                <th>In words</th> 
                <th>Issue date</th> 
                <th>Issue time</th> 
            </tr>
        </thead>
        <tbody>
            <?php foreach ($lists as $item): ?>
            <tr>
                <td class="border"> <a target="_blank" href="editTrade?id=<?=$item['id'] ?>">Edit</a> </td>
                <td class="border"><?=$item['id'] ?></td>
                <td class="border">
                    <img src="<?=$item['image_path'] ?>" style="width:100px" alt=""> 
            
                </td>
                <td class="border"><?=$item['license_no'] ?></td>
                 <td class="border"><?=$item['ward_no'] ?></td>
                <td class="border"><?=$item['name'] ?></td>
                <td class="border"><?=$item['father_name'] ?></td>
                <td class="border"><?=$item['mother_name'] ?></td>
                <td class="border"><?=$item['village'] ?></td>
                <td class="border"><?=$item['post_office'] ?></td>
                <td class="border"><?=$item['thana'] ?></td>
                <td class="border"><?=$item['district'] ?></td>
                <td class="border"><?=$item['permanent_village'] ?></td>
                <td class="border"><?=$item['permanent_post_office'] ?></td>
                <td class="border"><?=$item['permanent_thana'] ?></td>
                <td class="border"><?=$item['permanent_district'] ?></td>
                <td class="border"><?=$item['nid_number'] ?></td>
                <td class="border"><?=$item['tin_number'] ?></td>
                <td class="border"><?=$item['business_name'] ?></td>
                <td class="border"><?=$item['business_address'] ?></td>
                <td class="border"><?=$item['business_type'] ?></td>
                <td class="border"><?=$item['trade_license_type'] ?></td>
                <td class="border"><?=$item['trade_license_fee'] ?></td>
                <td class="border"><?=$item['in_words'] ?></td>
                <td class="border"><?=$item['issue_date'] ?></td>
                <td class="border"><?=$item['issue_time'] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
       
    </table>        
    </div>
    <nav aria-label="Page navigation" class="d-flex align-items-center mt-3 gap-3" >
        <div>
        Showing <?=$page;?> to <?= $limit; ?> of <?= $total_records; ?> entries
        </div>
				<ul class="pagination mb-0">
					<?php echo $pagination; ?>
				</ul>
				<form method="GET" action="admin/trade" class=" d-flex">
    <input type="hidden" name="search" value="<?php echo htmlspecialchars($search); ?>">
    <input type="hidden" name="limit" value="<?php echo htmlspecialchars($limit); ?>">
    <div class="form-group mx-sm-3">
        <input type="number" class="form-control" id="page" name="page" min="1" max="<?php echo $total_pages; ?>" placeholder="Page">
    </div>
    <button type="submit" class="btn btn-primary ">Go</button>
</form>
			</nav>
</div>

<?php include_once __DIR__.'/../footer.php'; ?>