-- Create the schema (SQLite3)

CREATE TABLE signatures (
    id INTEGER PRIMARY KEY,
    name TEXT,
    email TEXT,
    city TEXT,
    postal_code TEXT,
    address TEXT,
    year_of_birth INTEGER
);

CREATE TABLE markers (
    lat REAL,
    lng REAL
);

