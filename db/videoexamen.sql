drop table if exists public.personas cascade;

create table public.personas (
    id bigserial       constraint pk_personas primary key,
    nombre     varchar(100) not null
);

insert into public.personas (nombre)
    values ('Andrés Pajares'),
           ('Fernando Esteso'),
           ('Santiago Segura'),
           ('George Lucas'),
           ('Mariano Ozores'),
           ('Mark Hamill'),
           ('Paul Verhoeven'),
           ('José Padilha'),
           ('Peter Weller'),
           ('Gary Oldman'),
           ('Chiquito de la Calzada');

drop table if exists public.fichas cascade;

create table public.fichas (
    id    bigserial      constraint pk_fichas primary key,
    titulo      varchar(50) not null,
    anyo        numeric(4),
    duracion    int,
    director_id bigint      not null constraint fk_fichas_personas
                            references public.personas (id)
);

insert into public.fichas (titulo, anyo, duracion, director_id)
    values ('El imperio contraataca', 1980, 124, 4),
           ('Robocop', 1987, 103, 7),
           ('Los bingueros 2', 2008, 90, 5),
           ('Torrente 4: Lethal Crisis', 2011, 93, 3),
           ('Robocop', 2014, 113, 8);

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
