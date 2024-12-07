<?php

class Blog {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAll() {
        $query = "SELECT * FROM blogs ORDER BY created_at DESC";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function getBlogByID($blog_id) {
        $query = "SELECT * FROM blogs WHERE blog_id= :blog_id";
        $stmt = $this->db->prepare($query);
        $stmt->execute([':blog_id' => $blog_id]);
        return $stmt;
    }

    public function createBlog($admin_id, $blog_cate, $blog_name, $main_image, $sub_image, $main_content, $summary, $description, $alias, $status) {
        try {
            $query = "INSERT INTO blogs (admin_id, blog_cate, blog_name, main_image, sub_image, main_content, summary, description, alias, status)
                      VALUES (:admin_id, :blog_cate, :blog_name, :main_image, :sub_image, :main_content, :summary, :description, :alias, :status)";
    
            $stmt = $this->db->prepare($query);
    
            $stmt->execute([
                ':admin_id' => $admin_id,
                ':blog_cate' => $blog_cate,
                ':blog_name' => $blog_name,
                ':main_image' => $main_image,
                ':sub_image' => $sub_image,
                ':main_content' => $main_content,
                ':summary' => $summary,
                ':description' => $description,
                ':alias' => $alias,
                ':status' => $status,
            ]);
    
            return ['success' => true, 'message' => 'Blog đã được tạo thành công!'];
        } catch (PDOException $e) {
            return ['success' => false, 'message' => 'Lỗi: ' . $e->getMessage()];
        }
    }

    public function updateBlog($blog_id, $admin_id, $blog_cate, $blog_name, $main_image, $sub_image, $main_content, $summary, $description, $alias, $status) {
        try {
            $query = "UPDATE blogs 
                      SET admin_id= :admin_id, blog_cate= :blog_cate, blog_name= :blog_name, main_image= :main_image, sub_image= :sub_image, main_content= :main_content, summary= :summary, description= :description, alias= :alias, status= :status
                      WHERE blog_id= :blog_id";
            $stmt = $this->db->prepare($query);
            $stmt->execute([
                ':blog_id' => $blog_id,
                ':admin_id' => $admin_id,
                ':blog_cate' => $blog_cate,
                ':blog_name' => $blog_name,
                ':main_image' => $main_image,
                ':sub_image' => $sub_image,
                ':main_content' => $main_content,
                ':summary' => $summary,
                ':description' => $description,
                ':alias' => $alias,
                ':status' => $status,
            ]);
            return ['success' => true, 'message' => 'Blog đã được cập nhật thành công!'];
        } catch (PDOException $e) {
            return ['success' => false, 'message' => 'Lỗi: ' . $e->getMessage()];
        }
    }

    public function deleteBlog($blog_id) {
        try {
            $query = "DELETE FROM blogs WHERE blog_id= :blog_id";
            $stmt = $this->db->prepare($query);
            $stmt->execute([':blog_id' => $blog_id]);
            return ['success' => true, 'message' => 'Blog đã được xóa thành công!'];
        } catch (PDOException $e) {
            return ['success' => false, 'message' => 'Lỗi: ' . $e->getMessage()];
        }
    }
}
?>
