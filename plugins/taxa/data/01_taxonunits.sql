INSERT INTO taxonunits(taxonunitid, rankid, rankname, dirparentrankid, reqparentrankid) VALUES
 (1, 1, 'Organism', 1, 1),
 (2, 10, 'Kingdom', 1, 1),
 (3, 20, 'Subkingdom', 2, 2),
 (4, 25, 'Subkingdom clade', 2, 2),
 (5, 25, 'Infrakingdom', 3, 2),
 (6, 27, 'Superdivision', 5, 2),
 (7, 27, 'Superphylum', 5, 2),
 (8, 30, 'Division', 6, 2),
 (9, 30, 'Phylum', 7, 2),
 (10, 35, 'Division clade', 8, 2),
 (11, 35, 'Phylum clade', 9, 2),
 (12, 40, 'Subdivision', 8, 8),
 (13, 40, 'Subphylum', 9, 9),
 (14, 45, 'Infradivision', 12, 8),
 (15, 45, 'Infraphylum', 13, 9),
 (16, 45, 'Subdivision clade', 12, 8),
 (17, 45, 'Subphylum clade', 13, 9),
 (18, 47, 'Parvdivision', 14, 8),
 (19, 47, 'Parvphylum', 15, 9),
 (20, 50, 'Superclass', 13, 9),
 (21, 55, 'Superclass clade', 20, 9),
 (22, 60, 'Class', 20, 9),
 (23, 65, 'Class clade', 22, 9),
 (24, 70, 'Subclass', 22, 22),
 (25, 75, 'Subclass clade', 24, 22),
 (26, 80, 'Infraclass', 24, 22),
 (27, 90, 'Superorder', 26, 22),
 (28, 100, 'Order', 27, 22),
 (29, 105, 'Order clade', 28, 22),
 (30, 110, 'Suborder', 28, 28),
 (31, 115, 'Suborder clade', 30, 28),
 (32, 120, 'Infraorder', 30, 28),
 (33, 124, 'Section', 32, 28),
 (34, 126, 'Subsection', 33, 28),
 (35, 130, 'Superfamily', 34, 28),
 (36, 140, 'Family', 30, 28),
 (37, 150, 'Subfamily', 36, 36),
 (38, 160, 'Tribe', 37, 36),
 (39, 170, 'Subtribe', 38, 36),
 (40, 180, 'Genus', 39, 36),
 (41, 190, 'Subgenus', 40, 40),
 (42, 200, 'Section', 41, 40),
 (43, 210, 'Subsection', 42, 40),
 (44, 220, 'Species', 43, 40),
 (45, 230, 'Subspecies', 44, 40),
 (46, 240, 'Variety', 44, 40),
 (47, 240, 'Morph', 44, 40),
 (48, 245, 'Form', 44, 44),
 (49, 250, 'Subvariety', 46, 40),
 (50, 250, 'Race', 44, 44),
 (51, 255, 'Stirp', 44, 44),
 (52, 260, 'Form', 49, 40),
 (53, 260, 'Morph', 44, 44),
 (54, 265, 'Aberration', 44, 44),
 (55, 270, 'Subform', 52, 40),
 (56, 290, 'Cultivated', 44, 44),
 (57, 300, 'Unspecified', 44, 44)
