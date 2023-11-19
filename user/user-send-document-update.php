 <?php
            include_once('../backend/db.php');
            $id_doc = $_GET['id_doc'];
            $detail_doc = $_GET['detail_doc'];
            $id_type = $_GET['id_type'];
            $id_user = $_GET['id_user'];
            $id_user_re = $_GET['id_user_re'];
            $id_dep = $_GET['id_dep'];


            $sql = "UPDATE  doc 
                    SET detail_doc = '$detail_doc',
                        id_type = '$id_type',
                    WHERE id_doc like '$id_doc'";

            $stmt = $conn->prepare($sql);
            $stmt->execute();

            header("Location: index.php?menu=1");
            exit(0);
?>

            