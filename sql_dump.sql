PGDMP     
    -                {           wtech2    14.2    14.2 Z    j           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            k           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            l           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            m           1262    60107    wtech2    DATABASE     d   CREATE DATABASE wtech2 WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE = 'Slovak_Slovakia.1250';
    DROP DATABASE wtech2;
                postgres    false            I           1247    60303    delivery_options    TYPE     \   CREATE TYPE public.delivery_options AS ENUM (
    'postou',
    'kurierom',
    'osobne'
);
 #   DROP TYPE public.delivery_options;
       public          postgres    false            L           1247    60310 	   languages    TYPE     J   CREATE TYPE public.languages AS ENUM (
    'slovensky',
    'anglicky'
);
    DROP TYPE public.languages;
       public          postgres    false            O           1247    60316    payment_options    TYPE     k   CREATE TYPE public.payment_options AS ENUM (
    'dobierka',
    'karta',
    'prevod',
    'googlepay'
);
 "   DROP TYPE public.payment_options;
       public          postgres    false            R           1247    60326    roles    TYPE     >   CREATE TYPE public.roles AS ENUM (
    'user',
    'admin'
);
    DROP TYPE public.roles;
       public          postgres    false            U           1247    60332    types    TYPE     c   CREATE TYPE public.types AS ENUM (
    'brozovana',
    'pevna',
    'ekniha',
    'audiokniha'
);
    DROP TYPE public.types;
       public          postgres    false            �            1259    60341    author_book    TABLE     x   CREATE TABLE public.author_book (
    id bigint NOT NULL,
    author_id bigint NOT NULL,
    book_id bigint NOT NULL
);
    DROP TABLE public.author_book;
       public         heap    postgres    false            �            1259    60344    authors    TABLE     �   CREATE TABLE public.authors (
    id bigint NOT NULL,
    first_name character varying(255) NOT NULL,
    last_name character varying(255) NOT NULL
);
    DROP TABLE public.authors;
       public         heap    postgres    false            �            1259    60349    autor_books_id_seq    SEQUENCE     {   CREATE SEQUENCE public.autor_books_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.autor_books_id_seq;
       public          postgres    false    209            n           0    0    autor_books_id_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE public.autor_books_id_seq OWNED BY public.author_book.id;
          public          postgres    false    211            �            1259    60350    autors_id_seq    SEQUENCE     v   CREATE SEQUENCE public.autors_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 $   DROP SEQUENCE public.autors_id_seq;
       public          postgres    false    210            o           0    0    autors_id_seq    SEQUENCE OWNED BY     @   ALTER SEQUENCE public.autors_id_seq OWNED BY public.authors.id;
          public          postgres    false    212            �            1259    60472 	   book_cart    TABLE       CREATE TABLE public.book_cart (
    id bigint NOT NULL,
    cart_id bigint NOT NULL,
    book_id bigint NOT NULL,
    quantity bigint NOT NULL,
    created_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL,
    modified_at timestamp(0) without time zone
);
    DROP TABLE public.book_cart;
       public         heap    postgres    false            �            1259    60471    book_cart_id_seq    SEQUENCE     y   CREATE SEQUENCE public.book_cart_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 '   DROP SEQUENCE public.book_cart_id_seq;
       public          postgres    false    228            p           0    0    book_cart_id_seq    SEQUENCE OWNED BY     E   ALTER SEQUENCE public.book_cart_id_seq OWNED BY public.book_cart.id;
          public          postgres    false    227            �            1259    60351 
   book_order    TABLE       CREATE TABLE public.book_order (
    id bigint NOT NULL,
    order_detail_id bigint NOT NULL,
    book_id bigint NOT NULL,
    quantity bigint NOT NULL,
    created_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL,
    modified_at timestamp(0) without time zone
);
    DROP TABLE public.book_order;
       public         heap    postgres    false            �            1259    60355    books    TABLE     �  CREATE TABLE public.books (
    id bigint NOT NULL,
    isbn character varying(13),
    title character varying(255) NOT NULL,
    description character varying(2048) NOT NULL,
    price numeric(15,2),
    page_count integer,
    genre_id bigint,
    language public.languages,
    type public.types,
    created_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP,
    modified_at timestamp(0) without time zone
);
    DROP TABLE public.books;
       public         heap    postgres    false    844    853            �            1259    60361    books_id_seq    SEQUENCE     u   CREATE SEQUENCE public.books_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.books_id_seq;
       public          postgres    false    214            q           0    0    books_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.books_id_seq OWNED BY public.books.id;
          public          postgres    false    215            �            1259    60465    carts    TABLE     �   CREATE TABLE public.carts (
    id bigint NOT NULL,
    user_id bigint,
    created_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp without time zone
);
    DROP TABLE public.carts;
       public         heap    postgres    false            �            1259    60464    cart_id_seq    SEQUENCE     t   CREATE SEQUENCE public.cart_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 "   DROP SEQUENCE public.cart_id_seq;
       public          postgres    false    226            r           0    0    cart_id_seq    SEQUENCE OWNED BY     <   ALTER SEQUENCE public.cart_id_seq OWNED BY public.carts.id;
          public          postgres    false    225            �            1259    60366    genres    TABLE     �   CREATE TABLE public.genres (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    color character(7) NOT NULL
);
    DROP TABLE public.genres;
       public         heap    postgres    false            �            1259    60369    genres_id_seq    SEQUENCE     v   CREATE SEQUENCE public.genres_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 $   DROP SEQUENCE public.genres_id_seq;
       public          postgres    false    216            s           0    0    genres_id_seq    SEQUENCE OWNED BY     ?   ALTER SEQUENCE public.genres_id_seq OWNED BY public.genres.id;
          public          postgres    false    217            �            1259    60370    orders    TABLE       CREATE TABLE public.orders (
    id bigint NOT NULL,
    user_id bigint,
    first_name character varying(255) NOT NULL,
    last_name character varying(255) NOT NULL,
    email character varying(255),
    phone_number character varying(50),
    payment public.payment_options,
    delivery public.delivery_options,
    street character varying(255) NOT NULL,
    postal_code character varying(5) NOT NULL,
    created_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL,
    modified_at timestamp without time zone
);
    DROP TABLE public.orders;
       public         heap    postgres    false    847    841            �            1259    60376    order_details_id_seq    SEQUENCE     }   CREATE SEQUENCE public.order_details_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 +   DROP SEQUENCE public.order_details_id_seq;
       public          postgres    false    218            t           0    0    order_details_id_seq    SEQUENCE OWNED BY     F   ALTER SEQUENCE public.order_details_id_seq OWNED BY public.orders.id;
          public          postgres    false    219            �            1259    60377    order_items_id_seq    SEQUENCE     {   CREATE SEQUENCE public.order_items_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.order_items_id_seq;
       public          postgres    false    213            u           0    0    order_items_id_seq    SEQUENCE OWNED BY     H   ALTER SEQUENCE public.order_items_id_seq OWNED BY public.book_order.id;
          public          postgres    false    220            �            1259    60378    photos    TABLE     �   CREATE TABLE public.photos (
    id bigint NOT NULL,
    book_id bigint,
    filename character varying(255),
    created_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL,
    modified_at timestamp without time zone
);
    DROP TABLE public.photos;
       public         heap    postgres    false            �            1259    60381    photos_id_seq    SEQUENCE     v   CREATE SEQUENCE public.photos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 $   DROP SEQUENCE public.photos_id_seq;
       public          postgres    false    221            v           0    0    photos_id_seq    SEQUENCE OWNED BY     ?   ALTER SEQUENCE public.photos_id_seq OWNED BY public.photos.id;
          public          postgres    false    222            �            1259    60382    users    TABLE     �  CREATE TABLE public.users (
    id bigint NOT NULL,
    email character varying(255) NOT NULL,
    password character varying(255) NOT NULL,
    first_name character varying(255) NOT NULL,
    last_name character varying(255) NOT NULL,
    role public.roles NOT NULL,
    created_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp without time zone
);
    DROP TABLE public.users;
       public         heap    postgres    false    850            �            1259    60388    users_id_seq    SEQUENCE     u   CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.users_id_seq;
       public          postgres    false    223            w           0    0    users_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;
          public          postgres    false    224            �           2604    60389    author_book id    DEFAULT     p   ALTER TABLE ONLY public.author_book ALTER COLUMN id SET DEFAULT nextval('public.autor_books_id_seq'::regclass);
 =   ALTER TABLE public.author_book ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    211    209            �           2604    60390 
   authors id    DEFAULT     g   ALTER TABLE ONLY public.authors ALTER COLUMN id SET DEFAULT nextval('public.autors_id_seq'::regclass);
 9   ALTER TABLE public.authors ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    212    210            �           2604    60475    book_cart id    DEFAULT     l   ALTER TABLE ONLY public.book_cart ALTER COLUMN id SET DEFAULT nextval('public.book_cart_id_seq'::regclass);
 ;   ALTER TABLE public.book_cart ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    228    227    228            �           2604    60391    book_order id    DEFAULT     o   ALTER TABLE ONLY public.book_order ALTER COLUMN id SET DEFAULT nextval('public.order_items_id_seq'::regclass);
 <   ALTER TABLE public.book_order ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    220    213            �           2604    60392    books id    DEFAULT     d   ALTER TABLE ONLY public.books ALTER COLUMN id SET DEFAULT nextval('public.books_id_seq'::regclass);
 7   ALTER TABLE public.books ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    215    214            �           2604    60468    carts id    DEFAULT     c   ALTER TABLE ONLY public.carts ALTER COLUMN id SET DEFAULT nextval('public.cart_id_seq'::regclass);
 7   ALTER TABLE public.carts ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    225    226    226            �           2604    60394 	   genres id    DEFAULT     f   ALTER TABLE ONLY public.genres ALTER COLUMN id SET DEFAULT nextval('public.genres_id_seq'::regclass);
 8   ALTER TABLE public.genres ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    217    216            �           2604    60395 	   orders id    DEFAULT     m   ALTER TABLE ONLY public.orders ALTER COLUMN id SET DEFAULT nextval('public.order_details_id_seq'::regclass);
 8   ALTER TABLE public.orders ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    219    218            �           2604    60396 	   photos id    DEFAULT     f   ALTER TABLE ONLY public.photos ALTER COLUMN id SET DEFAULT nextval('public.photos_id_seq'::regclass);
 8   ALTER TABLE public.photos ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    222    221            �           2604    60397    users id    DEFAULT     d   ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);
 7   ALTER TABLE public.users ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    224    223            T          0    60341    author_book 
   TABLE DATA           =   COPY public.author_book (id, author_id, book_id) FROM stdin;
    public          postgres    false    209   �f       U          0    60344    authors 
   TABLE DATA           <   COPY public.authors (id, first_name, last_name) FROM stdin;
    public          postgres    false    210   �g       g          0    60472 	   book_cart 
   TABLE DATA           \   COPY public.book_cart (id, cart_id, book_id, quantity, created_at, modified_at) FROM stdin;
    public          postgres    false    228   ;j       X          0    60351 
   book_order 
   TABLE DATA           e   COPY public.book_order (id, order_detail_id, book_id, quantity, created_at, modified_at) FROM stdin;
    public          postgres    false    213   �j       Y          0    60355    books 
   TABLE DATA           �   COPY public.books (id, isbn, title, description, price, page_count, genre_id, language, type, created_at, modified_at) FROM stdin;
    public          postgres    false    214   �j       e          0    60465    carts 
   TABLE DATA           D   COPY public.carts (id, user_id, created_at, updated_at) FROM stdin;
    public          postgres    false    226    �       [          0    60366    genres 
   TABLE DATA           1   COPY public.genres (id, name, color) FROM stdin;
    public          postgres    false    216   W�       ]          0    60370    orders 
   TABLE DATA           �   COPY public.orders (id, user_id, first_name, last_name, email, phone_number, payment, delivery, street, postal_code, created_at, modified_at) FROM stdin;
    public          postgres    false    218   �       `          0    60378    photos 
   TABLE DATA           P   COPY public.photos (id, book_id, filename, created_at, modified_at) FROM stdin;
    public          postgres    false    221   5�       b          0    60382    users 
   TABLE DATA           i   COPY public.users (id, email, password, first_name, last_name, role, created_at, updated_at) FROM stdin;
    public          postgres    false    223   X�       x           0    0    autor_books_id_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.autor_books_id_seq', 53, true);
          public          postgres    false    211            y           0    0    autors_id_seq    SEQUENCE SET     <   SELECT pg_catalog.setval('public.autors_id_seq', 47, true);
          public          postgres    false    212            z           0    0    book_cart_id_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.book_cart_id_seq', 5, true);
          public          postgres    false    227            {           0    0    books_id_seq    SEQUENCE SET     ;   SELECT pg_catalog.setval('public.books_id_seq', 59, true);
          public          postgres    false    215            |           0    0    cart_id_seq    SEQUENCE SET     9   SELECT pg_catalog.setval('public.cart_id_seq', 1, true);
          public          postgres    false    225            }           0    0    genres_id_seq    SEQUENCE SET     <   SELECT pg_catalog.setval('public.genres_id_seq', 10, true);
          public          postgres    false    217            ~           0    0    order_details_id_seq    SEQUENCE SET     C   SELECT pg_catalog.setval('public.order_details_id_seq', 1, false);
          public          postgres    false    219                       0    0    order_items_id_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.order_items_id_seq', 1, false);
          public          postgres    false    220            �           0    0    photos_id_seq    SEQUENCE SET     =   SELECT pg_catalog.setval('public.photos_id_seq', 124, true);
          public          postgres    false    222            �           0    0    users_id_seq    SEQUENCE SET     ;   SELECT pg_catalog.setval('public.users_id_seq', 10, true);
          public          postgres    false    224            �           2606    60399    author_book autor_books_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.author_book
    ADD CONSTRAINT autor_books_pkey PRIMARY KEY (id);
 F   ALTER TABLE ONLY public.author_book DROP CONSTRAINT autor_books_pkey;
       public            postgres    false    209            �           2606    60401    authors autors_pkey 
   CONSTRAINT     Q   ALTER TABLE ONLY public.authors
    ADD CONSTRAINT autors_pkey PRIMARY KEY (id);
 =   ALTER TABLE ONLY public.authors DROP CONSTRAINT autors_pkey;
       public            postgres    false    210            �           2606    60477    book_cart book_cart_pkey 
   CONSTRAINT     V   ALTER TABLE ONLY public.book_cart
    ADD CONSTRAINT book_cart_pkey PRIMARY KEY (id);
 B   ALTER TABLE ONLY public.book_cart DROP CONSTRAINT book_cart_pkey;
       public            postgres    false    228            �           2606    60403    books books_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.books
    ADD CONSTRAINT books_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.books DROP CONSTRAINT books_pkey;
       public            postgres    false    214            �           2606    60470    carts cart_pkey 
   CONSTRAINT     M   ALTER TABLE ONLY public.carts
    ADD CONSTRAINT cart_pkey PRIMARY KEY (id);
 9   ALTER TABLE ONLY public.carts DROP CONSTRAINT cart_pkey;
       public            postgres    false    226            �           2606    60407    genres genres_pkey 
   CONSTRAINT     P   ALTER TABLE ONLY public.genres
    ADD CONSTRAINT genres_pkey PRIMARY KEY (id);
 <   ALTER TABLE ONLY public.genres DROP CONSTRAINT genres_pkey;
       public            postgres    false    216            �           2606    60409    orders order_details_pkey 
   CONSTRAINT     W   ALTER TABLE ONLY public.orders
    ADD CONSTRAINT order_details_pkey PRIMARY KEY (id);
 C   ALTER TABLE ONLY public.orders DROP CONSTRAINT order_details_pkey;
       public            postgres    false    218            �           2606    60411    book_order order_items_pkey 
   CONSTRAINT     Y   ALTER TABLE ONLY public.book_order
    ADD CONSTRAINT order_items_pkey PRIMARY KEY (id);
 E   ALTER TABLE ONLY public.book_order DROP CONSTRAINT order_items_pkey;
       public            postgres    false    213            �           2606    60413    photos photos_pkey 
   CONSTRAINT     P   ALTER TABLE ONLY public.photos
    ADD CONSTRAINT photos_pkey PRIMARY KEY (id);
 <   ALTER TABLE ONLY public.photos DROP CONSTRAINT photos_pkey;
       public            postgres    false    221            �           2606    60415    users users_emial_key 
   CONSTRAINT     Q   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_emial_key UNIQUE (email);
 ?   ALTER TABLE ONLY public.users DROP CONSTRAINT users_emial_key;
       public            postgres    false    223            �           2606    60417    users users_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.users DROP CONSTRAINT users_pkey;
       public            postgres    false    223            �           2606    60418 %   author_book autor_books_autor_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.author_book
    ADD CONSTRAINT autor_books_autor_id_fkey FOREIGN KEY (author_id) REFERENCES public.authors(id);
 O   ALTER TABLE ONLY public.author_book DROP CONSTRAINT autor_books_autor_id_fkey;
       public          postgres    false    3244    210    209            �           2606    60423 $   author_book autor_books_book_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.author_book
    ADD CONSTRAINT autor_books_book_id_fkey FOREIGN KEY (book_id) REFERENCES public.books(id);
 N   ALTER TABLE ONLY public.author_book DROP CONSTRAINT autor_books_book_id_fkey;
       public          postgres    false    209    3248    214            �           2606    60478     book_cart book_cart_book_id_fkey    FK CONSTRAINT        ALTER TABLE ONLY public.book_cart
    ADD CONSTRAINT book_cart_book_id_fkey FOREIGN KEY (book_id) REFERENCES public.books(id);
 J   ALTER TABLE ONLY public.book_cart DROP CONSTRAINT book_cart_book_id_fkey;
       public          postgres    false    3248    214    228            �           2606    60483     book_cart book_cart_cart_id_fkey    FK CONSTRAINT        ALTER TABLE ONLY public.book_cart
    ADD CONSTRAINT book_cart_cart_id_fkey FOREIGN KEY (cart_id) REFERENCES public.carts(id);
 J   ALTER TABLE ONLY public.book_cart DROP CONSTRAINT book_cart_cart_id_fkey;
       public          postgres    false    3260    228    226            �           2606    60428    books books_genre_id_fkey    FK CONSTRAINT     z   ALTER TABLE ONLY public.books
    ADD CONSTRAINT books_genre_id_fkey FOREIGN KEY (genre_id) REFERENCES public.genres(id);
 C   ALTER TABLE ONLY public.books DROP CONSTRAINT books_genre_id_fkey;
       public          postgres    false    3250    214    216            �           2606    60488    carts cart_user_id_fkey    FK CONSTRAINT     v   ALTER TABLE ONLY public.carts
    ADD CONSTRAINT cart_user_id_fkey FOREIGN KEY (user_id) REFERENCES public.users(id);
 A   ALTER TABLE ONLY public.carts DROP CONSTRAINT cart_user_id_fkey;
       public          postgres    false    226    3258    223            �           2606    60443 !   orders order_details_user_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.orders
    ADD CONSTRAINT order_details_user_id_fkey FOREIGN KEY (user_id) REFERENCES public.users(id);
 K   ALTER TABLE ONLY public.orders DROP CONSTRAINT order_details_user_id_fkey;
       public          postgres    false    218    223    3258            �           2606    60448 #   book_order order_items_book_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.book_order
    ADD CONSTRAINT order_items_book_id_fkey FOREIGN KEY (book_id) REFERENCES public.books(id);
 M   ALTER TABLE ONLY public.book_order DROP CONSTRAINT order_items_book_id_fkey;
       public          postgres    false    3248    213    214            �           2606    60453 +   book_order order_items_order_detail_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.book_order
    ADD CONSTRAINT order_items_order_detail_id_fkey FOREIGN KEY (order_detail_id) REFERENCES public.orders(id);
 U   ALTER TABLE ONLY public.book_order DROP CONSTRAINT order_items_order_detail_id_fkey;
       public          postgres    false    213    3252    218            �           2606    60458    photos photos_book_id_fkey    FK CONSTRAINT     y   ALTER TABLE ONLY public.photos
    ADD CONSTRAINT photos_book_id_fkey FOREIGN KEY (book_id) REFERENCES public.books(id);
 D   ALTER TABLE ONLY public.photos DROP CONSTRAINT photos_book_id_fkey;
       public          postgres    false    221    214    3248            T   �   x��ѭ�0C��a���r���Q%p+��	?,ע\�vm
�a�qx1����X��y=q���'C_/F#i1���})�~���a.X�f��0Me}�F3�b���0�PFw~���|��i%���Y˓��W��WuZAE�jH,��a3{lӯޫ���,3Z,3���}��l9Цl�С�Хl�1eK���Nj�/>���e���G���|Ⱍ�З�?��D!@C      U   v  x�%SKn�0]O�$�>�-���8I�͢�f,�%F�R��D�]d�]�����Ɇ Ifޏ1M��l-�!�J�ʈe���6�R��o+M���k�2:/\�4�:4n�zt�JK_�����xէ9׭?;_����ҵ�᠆tϾ��&�\�{D3���W�5 ����O�N�1��zMSm��T�Тt5����^޴e�����_��J� h�F�F^ٮ�ӽ6VTܣs�8m�.%������k������Fm��ÀP`G������Q�nOgxh�L�M#���e�j�U�݉.J�R[8��8Z����$�'�Ӽo�k�û��o���_�+������b��)��]y�a�f�I��g�zY�@����J�P�r8���}~�KW��=�5+h��mJ�D6�0��;:g��?�1wΠ���Jc����ɼ�K�p�& ���;
)ݹV��4L�cn�@����ߔl�@x����O38�t[��-0�t@��7����Ő!ƭM�W�T������2�TvF��@���QPY��;�W�fgI�U~�m+4�/��R@�R��?��eP����M ��=���h��%�b�Re}�}�ݰ@�}.�o*C��Z�F��8UJ�x��      g   =   x�3�4�46�44�4202�50�50R04�25�22���2*0D�7�22�2����qqq ���      X      x������ � �      Y      x���K�W�%<���5�*�oe��vI�%�Z*�o�&���ɓ��Îer�aڨ�E.��ŗ@UhTF��|���I���� ӏ�ݸu-&�����>�'���g'�������S׶��y�|_���!�EVz�6�$���+���b�6!���ʸ>kg��ƽ�o���ʛ,�|��:��"���Y�Lg1Yo���٢��ձ�Wxp[Ǣ�O����*����W��0�P�*{^ŗx~���"�}��U�]�O��"�n��|�+����G��_��t������Mh�0)|6���M1�f�g��Ô�+�e��H�����]�5m�W�/
��8U��bݎ3���~�5[�/�3���O�H���?s��`؟a��3�����������lt{��"L���/+7:�?<��t�� ;<�����џ����)��l����������^h7��8��~����wu�}��_vmv�E�����q�z�CY���)6ǵ����<f�ʵ3,����\�'1{���ٽ�-������Y�I�j�O�zUf�֛W�<k�^5�n�l���0�wo6ו�A ���u�m���<.�]�#���¿{�ؼ�{처���t����2�WY��]c�l[��3�6�0L̺i�Ew�y=��6.놥qX�X�u��|�*���������F|�c8�����|R�(���Wˊ�s]'!^�Әo��bF���U�.c=�8��U����|�@��<x2\�ٲ yU�x�y=�l^�b6�s_p��x5��_�-�4��Pu�l߾�H�E<&'/n�+>K�iT��ܬ��n��������_P�^�9َ;�ݤ�,.6�W`�r_e�l���Km�zs�="�1�^�����^N\�m�(|����o�
�Z�m�.;8?>��^`H�u�k���xK�b����B�y��-����WUz;k ��*�
���k�y��DR�t�Y�*{��:�*����]ʪ�_cDMV��OI{TT�w)�8Q.�'�D���vW`!�7:8�;?����FM!z��a������g�G�������ؼnc6��S�&���7�������Y,��9&�g��wy�V%��2��մp������(p�S�^ˣM�7���̽{n���GNS��"֪�x�
���vyG�"`��g�� e���ڼn 
1������m��X��"E�ܽ2��`�"���~�u�\��*%��� �9��Q�ZWy�.�٬��ʉ�q�k��=�\7H�S�J���'��ௐxWY��/W���:���nڎ|H!I��ɦ\�
��\��쏼���Ó�������q�����Л�fŖ�����a�"JK6�l>ގ}	�6~<��>c~��C���[�tϟ�?��?���bL�.� Y;�BR�۲����XCq�+2�2�;��fC��4=.7$�m|'��^���6m>{���G��Yc�$�_	9)!���'��F�u�j�rz���|;�ӽ�O ��.0$qǌl�y%=c�DA�;��rQ� �)�>�˸�Hv(�\B��Mͪ�N�=c7r�].�䨴Z)s}�mmSIݽ��1ݚ�}x}��/[m�
6�(�^�*W�@�к�����e�8ys�Ƒ����@[	�c�vW6-�|�eҎt���J�	D�G�%t0ÞI����FRPqx U� �����РŜ:�	��7iK��,�C���5U�Ϟ���]�;q�_fE�e�@�g�5!{��r�d��r��O�(���d&9z�����p�_�7��܍�zGIS�F��l��ۻ��d�vEa�&0Xh�%(�����e
@N4P�4!g'+� �
��Quk������@{�~G1ai���������[*`�1n�c^S��M��d�\�W�l����O�a+��� �0�$�0�,T�7c�a�@�,
1	�h,�-�Ө++s���D�#������X&҃�Wg�������������7����)�|SboW3:
��>�]}�0xF�-���|�gc᪶����7_ږn�?���LN+a2AxOV�����_��2��w"���D�Q����I����<��Ƞԋ.����k[�i�kR����`��+�2m�*�=..�|�i�����&u�{"�qox��% �*I�rE�\��l�!�א53�&K����j����E�gM� ��ͷ��t �%�ջ�c��\=��-����ni�Aꀀi�5�*G�ÊW�Tܡ�s��yE��pqM% �lWZ_r+�&j�q%�j�T��n=:غ�E|����	1�����1�ߤ�����&~-ނ�S��w�����T(R7��L����!9N)9�����8ڑgǇ�g��zE*��e��1zPwX��i����t������:OgKx/4�ۿ�p���L.(���Ϟz��zAE����e�/���w�b��/�&�3I�����!@�Ūn^��O*�=��@�4���א��ך������tK�
�o��p�m�Wr�TE��҄��EG���v����:�C4�qݯ��IZ2��eN�t����z����0Z��y�/�Z���d��$�M�AvS��X�^�6n�i�<��5�� ���Q"͖��o��uㇶ�^���Hq�����LGæ�0Ls^�$�ǚ
%!(t���ɳ�k�Q\o��BO�f���ߛ�O����~��dki.-����K���r�u%�q�������mM_fŹ={G�qAH�W�A�c�r���������INAӌY����%��
pĸ4:!��W�d��gБf�8��#(���i����8l ,9�*��IkƊ�I���W�!�� `y�f�J�j+^�9���9�-޿�B	�`Ђm`#��9�q�Q
D�h��[�k�$䑡�Z� �v�[H|�o�o����^�o���k��tqܱ�媷�/�m�c�9�����i�H�5��)"�X��!��U1BK|mF��ѭ����9~���}jVԱqщK{Z����n�~Ǿ�Hv,rE<��%7ð���qƣ!CT���M�0��LyM�{��cs�}ڹM�sRbt��A�o�]��ͱ��>e��!'���K_��<^��2i�M�Ӳ�t�m�d�ѸR��Sv�gK�9N%���Aiq5�Vu|�)��mc)�l���r_�B��_����J��F�M��֕k@��[�����|e�\i">�>�)Dc!
��=<ޭ�-����(��hF����o��B~mO�G�g���Ov	����Х�<�|���^�~���*E��˘cwLb;8�C�3XM��sE�kkJWM�;���U}D���54g�m`7Z�~:I��R��ɨu��e��r��Uo���O�Ͼ��.~8gNl�!�
5�R6-��m=S�t��8<�
("0�r�ݻk��t�@���3?����W�FӍ�tNL%��W�<�'��rN�*q��z�#��q�a*i�摋�����=��;�x(�n���I�h��Q�B]���hł�/b]��w�4Y��mr�0��M��>p�T�
����J�_9��W��H�B��l7k+��h�GLo�&��&;���~I�_�en��ݾ}~v>z�. 'c����ƞ�z�ʎ��j2�ҭ,�1��͠.�E�iyuUC�773X_/-1�@�⻺�rW��\�|����L�\�Ԝ;r(NX�[i�fS�6��%�E̺0T�Jf�T�$�a��YE>�0���Ea��1�Ɣ�(�k��TX����g�0��q��[�Bi0����n�I�:[8�~�/�ǫ��Sf�f$ǙMc��5>{Z�o>⥿�KW2��Ak���S�0�[��`�aT��EW�_=����_�k�>ʗaQxo.g-��237s5�,p0:>���5ٮ��.1�F��/b]����=�˰�X���5n�˲yHɮI��]����wC�BysiK%�x1�D��!�1�[ �k��+l���XN��!4��Qd����������X��^��	��'�T
�$_�Cз�N88�?8�}}�nɸ����۹[��    �u�\��f�C�E�?2��|�(x�g\��;������9�����b�;ه_��0&2c`�qʯ�i���4qw�ǔ�7GI�;_򝲱)�����`AXHIAJ�����xNg�I%�s��t�nB�-��V��m�������i	�#B�Q��sYɪ���2��*��
*-��@EiaY^�%C��fL	��s��x���I�1"� RQ��q'��e�º�-��V	�*Ż�?\>�q��P����g��זDx\�i��h�U���������G�3j���sWc�xR��
�
�瞻� �=�j�3���t��L�+1�5���2���.NFG'��^N��,���������_C��4�h|��t���~+[�G�Bdöa1��rE]?JfB�I%�z�T��[���>ތ7Z��rs��uTP@����н{C%�(���]nA���XN`nń��ٳP+;xd��B��jA.��9�AGӣ�}*&���OsXt%h���>W�*�|=�Ө��rP&S��֌=�~z��Q�����8� ��t�]���[K׾!��d��Eh����\��lu�躚!F懭�%�N1�_�DRlR�{H!����:|K#*��}��e�I���w���L�)-CS�6�e,`L�Ef��%l�,]ް ����Ү��̖ߥV��f�]�0���Oc�9i�������&���z�d�"T�Eb1|FR���[� �gL6eX��H��"��Ŏ4�2�3��^&�_F�C�����0K�~ӷ\�#����[��wF��&�~Cx�X�c���������螲O�KS����2�YF�&c}6}z?V�P��x�鹼נX�&b;�un�Kh�B�L�H]��J�f��5�}m:�v��hBE	�����Lڳ��.��X�җY `�̀���+�q<u��I�/q�/yv� �=�����t��+�g �	�=���]��_'����r�u��y�s3)>󍯗u�����2�i�pA��b������칂��Xs�~h��Q�����{�}Y���M�s��5�aP�.���_i/n��4�zc�d�5d��$�r�^賈���m�nX*����m�	�*�g1�gFr������ǣ�E�@K�t#3� :���٭��M+R�9Xږt�l�DA=�3 /vH��u�� I���ȹ�7�vZ��m����ZZ̠�U�0G�e=1�>p��a0%/���#U�����f���4qO�T�	��������}�=B��~ϱ� /z]���F`��@YM+Z�y��\�u!k<N���z*Q��Zx0��..�>ю�!�
����L;��wu{K�.,�eG��/H����$�T��L��d/�H�L�`#c����P���o"��vp|��{�3�w�q*��!5gP�o.1KmLy��3c�깭g�F��.ú�j��+L���k�=a~b|ϻ`�)�*}_xe�[W��� e�PRM�ET`Xy=�E}'��!��`3�o�-1)��&��I�;�C`s��BE��p
`)mOe]����Jv�7��E��qj�m��g�����UIRĎ�+%V��uB�ecq�}}�UĚH�a0X�,X0�&�M��Q�O��a�e�bN�-:����
��.��z���ɠ������R���	#l �ڞ�Zl��[�t���1F[���DaCO5@l����#�x�	)`mQ�%�G� ^!!��=�M	�uc�qv�	�[�IV��#���M�.8��;;�J�"�3`3E����V�n;�SlQ[Y�cJe��_��tV4N���0�@������`t|z<:����������B#��O�O�ݓP峮s�>��({��SxU���^k�Y�D��e���
��u7X�-��j��i�n�Y�=�= �<6G������g�lt���W>�T�]Ʃ4+��/����O�>nٸM6� �`y��
t𹜕��jN��𤪤�������'��8c+xqC�N�\Z2ғ,L��3�0���6��JU��_�	Q��\��t�ݯ�K�$E�G<W@qx�'��4�K�Z�� �6���e��
���V��y�i�cv�T��4��� ��m?����$�j>�gPt��K?@�A��#Dqw=��7�+��"b�}��Xrg����<�Bc���}ګ�0︋���B0��L�N��h����&�*{�f%��}؂��������=��J���Dr8�����\��T��ؾ�-@��]��A�3��P�1�0x��"�:\�hZ�z�	��2���Mt9-�L�RO��0�I��� �����gg��g#�ҋYW74��hJ�����U�k���L�A,xQ`�0�����w�P�D�g��|J>}���;J�{�(X�.�~g	�u--�JД�MĠ��2��H|U
G�eAl�_�?�SsP�����~`��Bv�9x�E��2D6m�������ZQ^=�K2Kѿ�0�R&�Eg^���>z�J�|"'����CW�^�~��,���5�3�_�)��+�H�%��a֩QY
>N<��d�@��ci��"?�W0�7Q�aOǇ'�G'�
�A�d���_�����H�p��KN�_x�X��������h^S
]S�A��;�#��ŜU|�{�Z��TCPݚu�Oo�]���������ߘ�B��l	�<�2�N�ɜvz�3*�"�e�Ы�{��¢�_�Q3N� �&�xYs<I�Ac#/b��&u�0E�-���Q�������D���T�v˱:F\=]��ne�� +8��V�������y��Cr|�b2�l�0�▮�%�-X���1淕[t�]m���^�����VA�TlΜI���_�d	|sP�/�𿶳�I�;�X��~gtp�w�dttt��(��������CQ�������<	M��D��X�s��UӰL�3������J�#ȗ/��9k�:�F����\`�f�F~R��-�R�2kØDk��C^B�z�����J"H�j�(
<�;�<M�,���Q%Ah�`9�����cZ��_NIP��������`C�����R.��˒l���5f�<S�,e�}��?��c��������_����y,8t��>�s�@7����3	p�U�w�m�v���k���Fċ����@T� {e�*d ����?��c*���lYZ�rEa�2�G�TL���Ӯ�Kg�gC����3PI*J F8��*��h��:><?�=z'����f�~�x7J�_;�z�'�ZL���iF�U0J�Y��j��ؐut��-^ӥ޼�Tx�ܼ��d_m^���"�
NO���3%UT�׌%3�YA]�IȺN�S1��IQt�b�@�=�.6�U��=���_Ǘ�g|�UWؤ�k��`�U���A��Z�2�q�����yɴRJ���	�\�J��l*|��uti��I
(��>w{�N ��
"[z�(4��yf"-��zs�2�̘��eXa�:c���բ^&�.9���Q6��wغ�`Ig���kh�!EC�9������	���n�O�Ga�ł�ٻ��e�h��uq�n������
��D/�2��v���ȃ+HW��RL5�T'f���ؿ��"���1�<&��A5�m����##��c�����(�\D�/Q�
'��>��>��^�b�c��1�5Go����/fPĊ��h�J#н�6�U�@o�;F�$���^���0aY��������I*��w�2H�_��wLq��f!Y첖<���a�ğUa9�����D�e퍁!��|*�1}�����L�5���,Z~ƛ4�0g+��į):#��^S]�*!��Uc�b�c�ok�P�O]*�
���+��[b����\�Tn�
�	k�&~��$u���u̘|Q��
WN��nn�0���o`��]F���!��SX����c?���[�x���E�"��R��j��?#����ǹѧ������D��2�,�� ��2550&!">�""��Z�]N�[�m^]�iE�\s%.����w�k��ި��yK\�VP�Xs���!��V"����H!�b    �K�M���*�ȋ�L���,�6�1_����TܳnVu��<�u�9s�VF�=��`��F�����})�2�È穔s�"�P����bi�xIM8����9���&�1YADpU2���k�c(ϭ)t$\ڶ:Zq�4H���ڮ�v�,p=���-�~�K���?�t��S,MM��&����, x��ʖ���"|C]�&�*d?�5�ZA��۵5����j���Br�&�\��q7���~���2���B�.����Z*LLU�ܽ�j˝�
N��N+e{K�hƝ�����{�,����w(�����G��Ls����E4j�rk!<6�=��s�۞�Ms��e/\}	�;U=�(os*8�Nn�`�q���-c�pȝ��5��,ܳB*���l/�MXv$��R��e��
*�	<��ک�-�Qy��]�c��DL8'�E/�������Lk܍)�1��� ��@k���DH,wQdf��nru5'�5���@��,���k�$���ΌT��rQC��N��9y��4�]��	,���m�4K��
�3�
�&�w��¯9�S���/�!;U�x���9^0�"4�������T�	䔐�"6�L�z���?�r�n ���K#�C��������`��h|CB�ɞ+b_���͂�ݡA@���,�>����{�k���������P�����%�%��������㺃Ƽ��Tu�5T��g7�?�K�IŨ��ֈ�]݁���wk�u�E*�8�uͲ�(!�/b��"�ǔd�cY���5aA�+)ݕ���>�!�r��{��s�NN�~��8���������Z��:�����͋���y}�L���`�U�OU��_�y��2^�����ҷ���n;�OT�R�D����e�l��G�y����u���<����U�V��U��@�q�"���zA��{O��Uo1���>₂_���Fd�����*�� Q�=i�H�d�e���;�,]{O�ak��LU�?zw9˔ޗ�G
"��Ȑ��1�א�ov��G�f��'+"9�f�-��s�\u�|����7Q�,@�)麒qG����Bv/c�b4G��,��,*nU~�Hh���QuI}�ȘORu�����W�+ >כ��X��b���n�_�O~�IQn�����Йa��Sr�U��9�n%�X�����ar lҷ��H�+y�.I|���q��+P��0�&��Rq���y�}�D���<���ZQ���1�������u�v�b=�G��G�Y?�P��8{Xm�ĵ�,8���Xl!�Y)2ټ�r�Xª���� `�F,�t6�T149>�)<~.ִ v���|fd#���.�k�o�e
fN�e����P{?�}���VS|�Iy� �E��^�_�e���4VZb�8���9Y@���	ûȞ͸6	�T��������Q�g=�E�W��S�J��؃����	�J&L'2o����@D9&\t�xH8Z�Q��Kְ7��`xw�1���:ڮB
��e��7/�u�
5\ɋ�
fC,g�jRd�.� d
.@p�2�n�D�_xVD4����(ʓ�Z��J�{��i�M��s�Kg	\�9L	�/;�?�d��`�W�3Dհe4���nz6��ǩ�����MNŊ����Ӷ��{��|���Bl��1N�%�y�+�XO`�t���x��b��B���Òy��Q��9�uT�i�Va�´�z�n��XKQcEL���=e��0�������uM��3��!�/9j����4=����J�t^�
ƶ-x���ق���d��䊒�I�L�XRޥ�cE������v�@�C��0�������_]bf�GI�����hNF[��<M5�2a%ЮH
��"�j�ce��/t(?������;��T���H�#Ĉj�tP��A��p�*�Yңc
B��۔��m��c�(4ә!��}�l�t����au͊&F���y���eN�eߘZ5h.�+7%ʡ� <�� ��m&++�X�l�ǀ�7)�{ٳ��E̗nƸH�R�K�P~�
-���~r��V�4\&�!�b���r���a�tS��6���C�¾-u�ŴaRT���1{٧�8Z<=�zl�, ��.�.1�+�a�-��Ֆ�G�	��V�l�P��a0�fE��$������_�ܩ�l����,�dۊu��+��ٽP�}�躰{�����d2�bC넾ѐV����Md�K���<Հ���xix�vZ,2�z��i$�2��z�}C��g+�k� J���(��x���+�����֍rDj�Y��k�z�̭��_��J�ޒ�L-�i*a$aR1nr�"I�v��@ ��z~F��+R)~�6C���o����^�����.DA/6�hg8|!�)5�p6~�[X���J��v�u�dx¥/ivw����Y���Κ�	|����_p����`�������.�!�+I �?���ѧ�#���+��*h1=��@�x�B�^�B��?�Z0���c"ܛ٭7M(0��!m���e����)BXt�¥���}�k�A{A���I%�Ά�������@�i�pY	4��ORO=��M:af�@����*ꫪ�4����4�u�`c00��:攅jb�%���Oy��d��Ph?g�[y|�2�.����^�l�#� \�{�c(��\�>���_"D�&؊��C�ʁ�G��d���/;V	�@�.Զ���E`F�lU�3��|a��zQAC�j!b�YeX��������iU���
�DU�ja�>�(��Ԡ&$�"�h~cRC�:S��˞Jر��D~ؼd~�f�5W�,���h������ș�b1&V�5�&!i`���kY���/Òƪ-�P��fV�K"'� �h�wf�$ Y2�r�b���0Rf"f����Y��������r	y��J�o�g���F���Ye�ʐ�
t~)p��`V���v����^#�·V��j0�/U�#$�Im�%��Ո|��:B9���W
O��xp������Cأ��(d���џ�;+}|K��'0�Wu�[^�l`����Ί�t&��j��������U�P1��C��TF����A�֞�/ja���	��b�����	��k)N1��XoGK[3P��SW�eo����V���'gq7�Y^1D�&������ƌ	��cԱK��R�ֿaX���N�������Ё�.��h�2�W7�K�X�h������4H)ľ��������h�*^�#��t(��j]�Ҭ'ZZ�n�+8t짵`J�ݶ��%����Kذwk���_ӷ���
��Fe��=Ֆ�����Y�,�<�i�O�,k�?���>(�S/CP�c��ZhXj5o��fK����	2bi���OV��#[a12C�:�)v)sj���о[��s
�^3�2{�A�v��� �A��	|P.1��6^�96���,��[��y\*��q{}�ج{��Q<3'��ձ���e�Oި�˞�5�z;i۝&��MB����'1�շ.f4�1�	�� ���vs����ouңa��q_,6�؜���X�
	�G��b�`b�J�;��k_Gq��L�Nupt�v4z�/	>��ηd��:_��B�W.(�b�..KFF$j%�cC��Bq#)�Zu��*V4��lc
�v������mt3y�쥫����؝�R-x��b+�E$�S%~ _���VaOV�h�['3�Њ�
���x��'�Đ7;e��)6��L?��V�%M׾Q���r�y��b���uYl�V������|����:���R-�~ �yf���gr!n�
�)-&����;m��!��²��m���b��b��4��_�ƾ����g�`�|��[�'��cT�!X��;jy@�]�z����@�n��,�w��:XnZ@������ef�]U��r���@�uĹ�D��V^�k�>H
�0rW�;��aEL+V&�Y1��`�\��<Q�>P��ɷ���a:<������|vp��z2��>��A�Z�"j�=߶    l�̮����s�ϊ��~�Mؖ��>�E��IX��P�g��9g�,OU�K�hP"H�d���e���P=�ʿI��t�^�4�b���ͩ0MB�|��n�A,!-��0��\k�՛o�ʢ����4��0�w��\WW꧂_`Vϵ�R�S[�w���l�'¢��}:8;��O?�m��d`z|>zH����}�h���i�~��R����p`k�����*A	$����n�)��2�=d�0����R��m����b���`f��MW+A��X��hMl��C��e�g��,W�Y2�b�-���RC���n���G��﫭��S恗��r̉+�~�}*-�:`<�]m-f
89����a�gH#�	dg��~��ֽj�$(��am	�O8�O[>��m�nn�-�}c3|O���7HU�SU���&�\�n.�4�,ƚ�'���a�&"�O�-"b #��?;�=�t2�L���:v��֥��uX��F�q]�{��!�i����Z[�)W��hb��+օ��;��&�l&+�a�kW��_��<���yQ�����"�N�\*�ӑem���亭���Gs���?�/����s`�:cς�-;�B
���.�/S�͹5����־-DWk�&{L�f�l��}�h��
^DS�):�Z���q� ���u�^����ܭA&��ء�{ߍӷ��d��j6;q��:�t{3Y ��N�c��H�Q��[�D\d�jh���λ����u�&���Ժׄ/�;�����P��Z�}Uˬ�"|zCϬ#�R6�_[�4�w���	5���������{�Ԅ�V���9`�ny�P�YG����4bK���q�,�Є-NB����9`i���톝�	��҆�r�Ԟ�.����w�G�QrՎ�����_�p�7�����ooy�dF�_q�)֬�{&H ��`�q�[�	��j5�Q����]/+k[5 $�J��`K��W�CW1z�@��^���Q�m���e�����<�ps�6w.;��/����u4@��ttQ��ں&���_�˻��:��
��!J��xe;�j�儊�1�U��h��2#������B8�
����}px�-ٶn:8:�}<z����,W ~v��W��1+?��H�k1�����բMܕn"VZI�E'�ݲ��uk�Q���B7ݤ���D�S��{����� T��YL����X�]���hy��C�zKRP�ŉW��Ԑ�C�L���7XDu��Bq��m��D��+�E�T�`���l��;����9�������,�����d�	΀���j�����b��>)f��/�:��D��(�_�W�[Τ4�w86�n�*��M���vx@_�Ӳ�3lr���?a;a��juY�;G�h$j�;�Q��d���E��[���M���W�fk�i�+�
���fX���V-7k]�X�F��k�g�'��H��~���t9���� |	_�`�=ۼ=�|�t���ϯ��d.�38m��u�.R�4=����q2x����W]t��0�����{��_�:7wg�t�ΐt�����Sw���₼gg#(�w�9�?�+�:؇�?===�	��
�҉��a:l�jm�Z�n�d`Z�XRp�g�T(i�<� ��m��d�Q@�q��0�Ծ����#�Q�`�9X��
�Dg�m�Ҁ]K[�$�!���۔���3-���03�6C�הQY����` FX�	�o;IzSؖ��xB����oئ�mY��s(�{u�s$�a�6�'n�W��t$Ia��ƃO����I�"D��y::B����ԺϔlÏ��Y3yb��2�C�)t�rU))~O�gc)^�Q�2�[��mv�D�F-���;��_�K�X��'izt�}XY�*����w=ڎ�	�C]�<�yO0�攟v�M��Vݠ�i��>���R��잫�8����[�$�A�6ؒ�ߞb�cݔϰ#�����O6�R|�:l��mq�{��C_�Ҳd��&=a��%>��a1&.�+t��j��u��j���S���xݟ|���
P�f�O����J �d�f(�[�P[�$� ��$����G�E���V �%6Æe�4��*sXΣJ�^��>���cҶ�n�ŷN��%¾1�ж�7�8���ۓ��&��{D�P��9����@N>��������5��CsZ�r��SK�̆v�R�����h��3�Dx�P�~'>o�w<T��Q��S9��@9Ĩ��Kj�uϯS�r�g��?\�td�M���0����s�6o�^�(vI���%H���%;zJ�X�1/R˦�xbgk��9��������ݳ�v����|���X �(keS�M]��7[ч����j~��ԥ������@]���鉺:�>r3�3����@Hۙ�Tz_�R�j6eL�f�[M�x�yR��V�-vDb���hК����8ϚJ[��Шu͜)h�d_XO�?���]Z*\?���z\ŉ�8����b�Yo�I`#�qj
"0l��K���H�Dz2��U�cW좘}�bw��v�}�{>ƚD�wm�~���qt�(�0ߙ�_�i��iz�Kl��P �ԯ�#b`�lj�?!����W-@EN�����$�s���<�;�﫽K0���~%�s��m�W��B��b�w�4���>5لS��X����/��v����-�$'i��l^��֧5��4���ٱ�Է��A��L��-���4v���O��kj�	�gRI ���-��l�Z�۷�g�J�C{x�7u!�-g�X�N�o�����cl���|�Ň����ɇًO����O���O�>}���lQ����r�"���<Y�$;\�*
����N���WWq�O5��=�JT�e��ANUDj����ii|����C���r���ia��٘vINr�*.g��!������5H��`U�������X��H��OI��
�<j��3&��Ꮔ/�������#?�K���K��O�~uE��=d^�g��#�)^��HͦL{�� �34&k���p�:j���j�n./�N���z!�S�Vk��H6�����1�^@9lw����dt~~��r~�����5Clc�:_���2�8�qQ�?�Xu�߹�&e���U�2��>�L������WH
Mw+��(A��|���������]��&K+�� �Y��% S�2���D�E��B�Z�,��D�l2Z�lf!�U��k۫XW%�ٚ����с55q��uR���V_U�k����Γ3���H��g+�0n�0z=U��l��T�mR�$@�*���v6@�f�7�}��+�+4\l���z,�1��%���� �	��FRh6��#B֮��*�{N=��{%��T�N-� ���!u�G�;ƻ5%����߾]-o<zq��˜p�f'���ΏΎ����?�	��G}��/��%N�����-)&5нyh;4� y�o��;6����U��CrE�1a��>�|���a�Z��P4�R1{k��~_S��������Hjx)���T���M]��W��B0eܾ�=�O��֎���w��e	ܹ��h��2m;'�|��R�5�ed�G"6s1�8���VZ�6бJ�
%��j�{.,���b�KL�0oT�~�NyXM��X������{v\�H�YԆ6Qe�[���@ˬo����o�,ͣol�-C�J�I0:�e�5ǚY�jU�Hd���}w?A� �Ǭ�Wߥi{m��l�~��^������+dX��a�Y������ч��J��g���>���������t7E%�;��l"|��o��8��z��Ѭ��>�B4�#O���G��I�0RAmX�qE���M�2xDx�p-S�}Ϲ��q�<��L-�R� ������� S����0�h��G�.��"q�l��2T���[�ˮ��i��� p�O�\�	����t
����s�7Õ#�I���sP,&�G,۰���L'�1&��s���_�@����筅t�:�t�j�:_���e:u�:�7�'ď���O�9T7:5��ZO��g�']1�̷��̎2��jLL��h^���M���s�N��OK7 W  c�#����Ui���0���x&1n�7���n�YUٚ�\Z�da"�.z���5���3�v��%Y����Z���aW�i���>W��!�CLh,6J�r��άY���r�iAP�2`� ��47��1���)��?���h�k�Hoo��Ĕ"�
��M)��1؀�:����w��T���疌u: ׊�S�=�yy�_Z4���6����7���h���yWH�_��슝���9<=<}��w094�O�޸��R�~7�EE'���P���s؜�a�X��$��o۳����B�ˍ��,���I�v��᪆�R�U9Xv�c�;�s&�[�(ۋk���@~���2����`�XCQ����v�﷎o����!g�JSƜ-��	j��b�����+�)]�v���C.�C<}YM�&}��EX�N�)��х.0����N
RW_��7u��%���:X2�A�
���K%Znɬ������Dߩ�0�N�G��ډ��vxTȭ���!�]+� ��`���0��X�w`[d<�I{�	/�`�>P�k�j���I�B�:X�N���zcޏ�Z����b�RR\����*���Oh��\����`bv��M��:C׊Um*۽�\���5��%�n�F�?��j"�U�j��e�"s��A�Q���'@�M;G<2��������Q�B;݂���G@k%�L�f�EB폩|�����:��;ك��::\Y�r2���Ĭ����$b["Jm��NVAbf�ct��vB�O���ʅ�����+�l+aG���]ar'�t��o��}S�ӣ�g�秣�<ؽ����A�H;�N�3-��6��aE6�m��7�0�e�e��\���pb:�L��݇��􍔟���դ��צ+�E����~��c�]T��k1���ܕ���j��1��j��V�t�V�V'}�%�Xm}y��-�ֶZ{�z����E��{�"ץS\`2�_t��<=��������{2����ì���/xH`��Ұ��U��>l��k��Aj�nZ�?�ߒ���.��N�G�����I3��70cw���}R3�`7 ��M#y�E7�
]��g��u�px ���<��YZ�}��fN>	�:�>'d(WI}�>�Aa�\k*��uҲS����£8�v�i��,�>-�=%f��S���gMG�p�G翐�8���X�jO�׎������nV�±/+�T�9z��l/�O��}�~���Ul��06� ��Wv�~I��7�q�t� ����u(o�1����7;����|ŗ5f�.���d�����k��/����e�{
+Y���R�ox�},~W�U�u��?����v�����AW�d��֠��y�o�q=���TE.~�kA�'���<�	+����������N�>tv�AZ��}�~���)d��?g�����wn����9m��2�.ZO�܁�����,P�R�A��}G�gQ��L�����wװR�T�s6ײc�R�3+�۞�+t��
J�H��R.����r�x9OZ�5�=��
?W�8���'�~0q������w�h� Ed�2��e�7��w}!���CA�1���� 4쏷o>�X����l�VձI�JO�����5�ԗ�[�����tog�i��nd���V2���O0�A�W�<>��RQĊ��B�WD=��=.��׆�rEy�Y�Q�����di�vؿZo�)��OG��>_i5���b �2��X��Wk�W�nei��r��L����*N畃����u���G���0U�Y(���^�����fO����X;���mNPJ6����϶:��O��BDx��K;,I��uhX	�,����������
j�qz������D��8��L�R9�i���EX�_r5^�XEYJb��"��J7ud43�jMb+,�fjԅ��hV+��S���)�sxv¥�gl�Z� �~��|�?a��l-p��g�#�!r�z���s��~�Gj5 �R㶰�-;�Ǳ�93��Ȭ�G-��~���2�e��.:֒�Y����:1a�F��҃�$�مſKv�pD������W�vk�~�T�i�B� ��Ϲ���5'cot&v:8��������?U�2      e   '   x�3�4�4202�50�50R0��22�21�&����� �	�      [   �   x�-�M
�0��{��Zi��,�KQ7���QBi*x(��3���1��ԃ��t�IY�@i�{�~^�;��*	s�n��I����v���oD��!l�t3������S@kfo�����H(ΰ����$8�S\G;���#�d���̠�h���b0K�b��)����S�x�"��;>      ]      x������ � �      `     x���Mr�8���S��.���n���ff1�d��)��M�$�� ]�r�,�Y9��4�TEE�yV�T��_@$�R���q�?<R��m��o"z&o��.KD����ϛ���!�x���x<���Ѳ5����m$�+�H"S������Um���F݃��mɞSL^��Ve-�I����d{/G�i(^
�(%?+�{����J厐!6q({H)5���Z��u
�] ���1�H.�1�����<��h_�FN�)�U�ʮ���*�^՟SNFMr7TF�pI��;�r�آ��a�E#
*�T����e�M�0<� ��9)���S�MU�+�	L� H_J<�؆�\_�c7�J��vX�l�����S��橶�V��%6q��	m*�gͻ�m������{UAy#�EC�CbKTv��dd7�8X�h�A��5�80�1��4������d�+R��0HdNl�jT��0�D�)�H��SjB�:)&����
��E+ɾ��ּt6n�&�.H[!��Ivj��&�F��
��
�y���5���� �1��O�Gժ�+�X�-jx��rF�Hd4��x��m�q���W���*g�t'�c@p����J��]c��e�W��
�e�oo����<���}��������xl����d#��i�U����\���"�!e����y�̝e�G>F�o���+�/f�4��-���m�P��	����{Lw�d �ْ���K9=��Δ�n���;z�Sς5�ԕ�5�Ԗ�{2>��[�r2�d��=OG�8��}�G[��:)K]���i��N6`(3{� g���a5Z�C�%�����,{)
�%�x�0���ts �R�A��E@�/u�=�ٿ���b�@YB��j�m�#vQ�G�/��yB��q-�\�$O$,[ �0v@L֔j8X#��F�ZI���y��#�vEB})=�	��k��֘�"
ee����~0�),]�d�<쓌}"Ge�ӓu-v�,�5�c��T�v�ʡ���L�] ��잂d��Qטg���n�^�� [�pe"��-$n�4�s��z�+[����L]��鈯ƀ�!���H��O^z�P[�,v�$�t���g4�<'>�tä�ڵ���4o��*��J����{3T�|���Uu����"<�0���)d�%$�����YRI�1t_�Q���Z�Ny>�<�?�u$�+6V-{3�?Nb��c������;ɻÏ����W���q1���T+��N�k@=Ŋ��W���y�5C�-!�W�P,!,���Q�/5F�"X��A�������?D���      b   �  x���;o�0���F�d��3Տ��+i4i�.g�,]D�.I�ѷ��	ҥ�-������xN))P�/��Aa��Rt���q�����P<݆���pWo)���6Wп3c�f��d=�qP����QF�+��h9Q�	��ŕJ�a�VT�?q�/��Eɸ9�.���ubqB��R����8C�ΓFy�,��a+�6�kP��/f_��q��U�j�`咼@qzol*�-���7�k��}{m�3K��\�\;��n�%��{�ˇfġx2�0�,�Jc��)'L$9E�[�$���X9�f�O�����E���/�7١�Z��������b3�H����P�#hj�y�Ѓ��)lՎ7z��v43~���	lڞne�\T�0'W�	�fϱZ/פv�r�l���g����;=?o	�$�&p$-I���ŉB��=_�m�K]�5��~�zMqS%�\�S�]o��t:�?���     