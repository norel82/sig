CREATE EXTENSION IF NOT EXISTS postgis;

CREATE TABLE IF NOT EXISTS lieux (
    id SERIAL PRIMARY KEY,
    nom VARCHAR(100),
    geom GEOMETRY(Point, 4326)
);


TRUNCATE TABLE lieux;

INSERT INTO lieux (nom, geom) VALUES
('Tour Eiffel', ST_SetSRID(ST_MakePoint(2.2945, 48.8584), 4326)),
('Louvre', ST_SetSRID(ST_MakePoint(2.3364, 48.8606), 4326)),
('Muséum national d’Histoire naturelle', ST_SetSRID(ST_MakePoint(2.3560490942326218, 48.84185618613116), 4326));
