PGDMP     "                    z            projetolaravel     13.7 (Ubuntu 13.7-1.pgdg20.04+1)     14.4 (Ubuntu 14.4-1.pgdg20.04+1)     �           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            �           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            �           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            �           1262    19158    projetolaravel    DATABASE     c   CREATE DATABASE projetolaravel WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE = 'en_US.UTF-8';
    DROP DATABASE projetolaravel;
                postgres    false            �            1259    19217    clientes    TABLE     3  CREATE TABLE public.clientes (
    id bigint NOT NULL,
    nome character varying(100) NOT NULL,
    valor double precision DEFAULT '0'::double precision NOT NULL,
    comentario text DEFAULT ''::text NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.clientes;
       public         heap    postgres    false            �            1259    19215    clientes_id_seq    SEQUENCE     x   CREATE SEQUENCE public.clientes_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.clientes_id_seq;
       public          postgres    false    210            �           0    0    clientes_id_seq    SEQUENCE OWNED BY     C   ALTER SEQUENCE public.clientes_id_seq OWNED BY public.clientes.id;
          public          postgres    false    209            E           2604    19220    clientes id    DEFAULT     j   ALTER TABLE ONLY public.clientes ALTER COLUMN id SET DEFAULT nextval('public.clientes_id_seq'::regclass);
 :   ALTER TABLE public.clientes ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    210    209    210            �          0    19217    clientes 
   TABLE DATA           W   COPY public.clientes (id, nome, valor, comentario, created_at, updated_at) FROM stdin;
    public          postgres    false    210   w       �           0    0    clientes_id_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.clientes_id_seq', 30, true);
          public          postgres    false    209            I           2606    19227    clientes clientes_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.clientes
    ADD CONSTRAINT clientes_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.clientes DROP CONSTRAINT clientes_pkey;
       public            postgres    false    210            �   �   x�m�M�0��3��0�?���\�i��$@��+y/f0�M�����PEUֺ� ��7��b��$N�4"�D�⽊�CJ�`�<R.�~�ߕp��I_����1�5$��9�S�l�ʺ2mo�~_#��r(t�;}�s���3� V���-�C��Yw�n K�o�򞣶q�1�����<��C���oE     