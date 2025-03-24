USE
hogwarts;
INSERT INTO houses (name)
VALUES ('Gryffindor'),
       ('Hufflepuff'),
       ('Ravenclaw'),
       ('Slytherin');


INSERT INTO wands (name, magic_power, wood, core)
VALUES ('Flamecaster', 95, 'Holly', 'Phoenix Feather'),
       ('Shadowfang', 90, 'Yew', 'Dragon Heartstring'),
       ('Eldermight', 99, 'Elder', 'Unicorn Hair'),
       ('Moonwhisper', 85, 'Willow', 'Thestral Tail Hair'),
       ('Stormbinder', 88, 'Hawthorn', 'Phoenix Feather'),
       ('Oakvenom', 92, 'Oak', 'Dragon Heartstring'),
       ('Inferno Branch', 87, 'Maple', 'Phoenix Feather'),
       ('Silverstrider', 82, 'Ash', 'Unicorn Hair'),
       ('Venomfang', 96, 'Cherry', 'Basilisk Horn'),
       ('Charmweaver', 80, 'Birch', 'Veela Hair'),
       ('Firebrand', 89, 'Walnut', 'Dragon Heartstring'),
       ('Blazebeak', 84, 'Poplar', 'Phoenix Feather'),
       ('Stormhowler', 97, 'Rowan', 'Thunderbird Tail Feather'),
       ('Emerald Whisper', 75, 'Cedar', 'Leprechaun Hair'),
       ('Wavebinder', 83, 'Hazel', 'Kelpie Hair'),
       ('Wildflame', 90, 'Sycamore', 'Rougarou Hair'),
       ('Tempestcaller', 94, 'Blackthorn', 'Thunderbird Tail Feather'),
       ('Poisonfang', 98, 'Alder', 'Basilisk Horn'),
       ('Aurora Shroud', 78, 'Pine', 'Veela Hair'),
       ('Beastbane', 91, 'Spruce', 'Wampus Cat Hair');

INSERT INTO shop_items (name, image_path, category, price)
VALUES ('Witch Broom', 'witch_broom.jpeg', 'Broom', 100),
       ('Plants Broom', 'plants_broom.jpeg', 'Broom', 300),
       ('Basic Broom', 'basic_broom.jpeg', 'Broom', 50),
       ('Gryffindor Broom 👑', 'gryffindor_broom.jpeg', 'Broom', 1000),
       ('Bats Broom', 'bats_broom.jpeg', 'Broom', 500),
       ('No Sleep Potion', 'nosleep_potion.jpeg', 'Potion Ingredient', '250'),
       ('Submit Task Before Deadline Potion', 'deadlines.jpeg', 'Potion Ingredient', '10000'),
       ('Basic Spell Book', 'basic_spell_book.jpeg', 'Spell Book', '50'),
       ('Dark Magic (php)', 'php.jpeg', 'Spell Book', '500');

INSERT INTO professors (name, email, password, role)
VALUES ('Albus Dumbledore', 'dambldore@hogwarts.edu', '$2y$10$acehqg9h2EbE.LcoMpEp7OV6cOxfPXfYGIZzT9pmuznucSMMVbcj6',
        'Chairman');