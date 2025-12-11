CREATE TABLE IF NOT EXISTS users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) UNIQUE NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'guest') NOT NULL DEFAULT 'guest',
    date_added DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS cards (
    card_id INT AUTO_INCREMENT PRIMARY KEY,
    page ENUM('certificate', 'portfolio') NOT NULL,
    category VARCHAR(50) NOT NULL, 
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS card_links (
    id INT AUTO_INCREMENT PRIMARY KEY,
    card_id INT NOT NULL,
    label VARCHAR(255) NOT NULL,
    url TEXT NOT NULL,
    FOREIGN KEY (card_id) REFERENCES cards(card_id)
);

CREATE TABLE IF NOT EXISTS about (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,  
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
CREATE TABLE IF NOT EXISTS skill_categories{
    category_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    icon VARCHAR(100) DEFAULT NULL,    
    sort_order INT DEFAULT 0           
}
CREATE TABLE IF NOT EXISTS skills (
    skill_id INT AUTO_INCREMENT PRIMARY KEY,
    category_id INT NOT NULL,  -
    skill_name VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES skill_categories(category_id)
);