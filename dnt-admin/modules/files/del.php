<?php

use DntLibrary\Base\Image;

$image = new Image();
if (isset($_POST['sent'])) {
    foreach ($_POST as $id => $value) {
        $id = str_replace('del_', '', $id);
        if (filter_var($id, FILTER_VALIDATE_INT)) {
            $ids[] = $id;
        }
    }

    foreach ($ids as $imageId) {
        $imageName = $image->getFileImage($imageId, false);
        if (!$image->hasVendorDipendency($imageId)) {
            $fileName = '../dnt-view/data/uploads/' . $imageName;
            $dnt->deleteFile($fileName);

            //OTHER FORMAT
            foreach ($dntUpload->imageFormats() as $format) {
                $dnt->deleteFile('../dnt-view/data/uploads/formats/' . $format . '/' . $imageName);
            }
        }
    }

    $ids = implode(',', $ids);
    $db->query("DELETE FROM dnt_uploads WHERE id_entity IN ($ids) AND vendor_id = '" . $vendor->getId() . "'");
} else {
    $post_id = $rest->get('post_id');
    if ($post_id) {
        $post_id = $rest->get('post_id');
        $imageName = $image->getFileImage($post_id, false);
        if (!$image->hasVendorDipendency($post_id)) {
            $fileName = '../dnt-view/data/uploads/' . $imageName;
            $dnt->deleteFile($fileName);

            //OTHER FORMAT
            foreach ($dntUpload->imageFormats() as $format) {
                $dnt->deleteFile('../dnt-view/data/uploads/formats/' . $format . '/' . $imageName);
            }
        }
        $where = array('id_entity' => $post_id, 'vendor_id' => $vendor->getId());
        $db->delete('dnt_uploads', $where);
        $image->cleanIndependentFiles();
    }
}

$dnt->redirect(WWW_PATH_ADMIN_2 . 'index.php?src=' . $rest->get('src') . '');
