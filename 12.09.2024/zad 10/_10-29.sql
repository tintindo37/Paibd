CREATE TABLE sessions (
    id VARCHAR(255) PRIMARY KEY,
    data TEXT NOT NULL,
    last_access TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);