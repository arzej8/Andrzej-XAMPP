-- ‒ Zapytanie 1: wybierające jedynie pola id, nazwa i wystepowanie z tabeli Ryby dla ryb drapieżnych

SELECT id, nazwa, wystepowanie FROM ryby WHERE styl_zycia = 1

-- ‒ Zapytanie 2: wybierające jedynie pola Ryby_id oraz wymiar_ochronny z tabeli Okres_ochronny dla ryb, których wymiar ochronny jest mniejszy niż 30 cm

SELECT Ryby_id, wymiar_ochronny FROM okres_ochronny WHERE wymiar_ochronny < 30

-- ‒ Zapytanie 3: wybierające jedynie pole nazwa z tabeli Ryby oraz odpowiadające tej nazwie pola akwen i wojewodztwo z tabeli Lowisko dla łowisk, które są rzekami. Zapytanie wykorzystuje relację

SELECT nazwa, akwen, wojewodztwo FROM ryby
INNER JOIN lowisko ON ryby.id = lowisko.ryby_id;

-- ‒ Zapytanie 4: dodające do tabeli Ryby kolumnę dobowy_limit typu numerycznego, o rozmiarze pozwalającym na wpisanie jedynie liczb z przedziału <0, 255>

alter table ryby
ADD COLUMN dobowy_limit int check(dobowy_limit between 0 and 255)