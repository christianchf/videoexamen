drop table if exists public.personas cascade;

create table public.personas (
    id bigint       constraint pk_personas primary key,
    nombre     varchar(100) not null
);

insert into public.personas (id, nombre)
    values (1, 'Andrés Pajares'),
           (2, 'Fernando Esteso'),
           (3, 'Santiago Segura'),
           (4, 'George Lucas'),
           (5, 'Mariano Ozores'),
           (6, 'Mark Hamill'),
           (7, 'Paul Verhoeven'),
           (8, 'José Padilha'),
           (9, 'Peter Weller'),
           (10, 'Gary Oldman'),
           (11, 'Chiquito de la Calzada');

drop table if exists public.fichas cascade;

create table public.fichas (
    id    bigint      constraint pk_fichas primary key,
    titulo      varchar(50) not null,
    anyo        numeric(4),
    duracion    int,
    director_id bigint      not null constraint fk_fichas_personas
                            references public.personas (id)
);

insert into public.fichas (id, titulo, anyo, duracion, director_id)
    values (1, 'El imperio contraataca', 1980, 124, 4),
           (2, 'Robocop', 1987, 103, 7),
           (3, 'Los bingueros 2', 2008, 90, 5),
           (4, 'Torrente 4: Lethal Crisis', 2011, 93, 3),
           (5, 'Robocop', 2014, 113, 8);

drop table if exists public.reparto cascade;

create table public.reparto (
  ficha_id   bigint constraint fk_reparto_fichas
                    references public.fichas (id),
  persona_id bigint constraint fk_reparto_personas
                    references public.personas (id),
  constraint pk_reparto primary key (ficha_id, persona_id)
);

insert into public.reparto (ficha_id, persona_id)
    values (1, 6),
           (2, 9),
           (3, 1),
           (3, 2),
           (4, 3),
           (5, 10);
