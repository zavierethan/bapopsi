/*
 Navicat Premium Data Transfer

 Source Server         : Pryadis Butchers
 Source Server Type    : PostgreSQL
 Source Server Version : 160001 (160001)
 Source Host           : localhost:5432
 Source Catalog        : porda
 Source Schema         : public

 Target Server Type    : PostgreSQL
 Target Server Version : 160001 (160001)
 File Encoding         : 65001

 Date: 12/08/2025 04:52:17
*/


-- ----------------------------
-- Type structure for post_status
-- ----------------------------
DROP TYPE IF EXISTS "public"."post_status";
CREATE TYPE "public"."post_status" AS ENUM (
  'draft',
  'published',
  'archived'
);
ALTER TYPE "public"."post_status" OWNER TO "postgres";

-- ----------------------------
-- Type structure for tablefunc_crosstab_2
-- ----------------------------
DROP TYPE IF EXISTS "public"."tablefunc_crosstab_2";
CREATE TYPE "public"."tablefunc_crosstab_2" AS (
  "row_name" text COLLATE "pg_catalog"."default",
  "category_1" text COLLATE "pg_catalog"."default",
  "category_2" text COLLATE "pg_catalog"."default"
);
ALTER TYPE "public"."tablefunc_crosstab_2" OWNER TO "postgres";

-- ----------------------------
-- Type structure for tablefunc_crosstab_3
-- ----------------------------
DROP TYPE IF EXISTS "public"."tablefunc_crosstab_3";
CREATE TYPE "public"."tablefunc_crosstab_3" AS (
  "row_name" text COLLATE "pg_catalog"."default",
  "category_1" text COLLATE "pg_catalog"."default",
  "category_2" text COLLATE "pg_catalog"."default",
  "category_3" text COLLATE "pg_catalog"."default"
);
ALTER TYPE "public"."tablefunc_crosstab_3" OWNER TO "postgres";

-- ----------------------------
-- Type structure for tablefunc_crosstab_4
-- ----------------------------
DROP TYPE IF EXISTS "public"."tablefunc_crosstab_4";
CREATE TYPE "public"."tablefunc_crosstab_4" AS (
  "row_name" text COLLATE "pg_catalog"."default",
  "category_1" text COLLATE "pg_catalog"."default",
  "category_2" text COLLATE "pg_catalog"."default",
  "category_3" text COLLATE "pg_catalog"."default",
  "category_4" text COLLATE "pg_catalog"."default"
);
ALTER TYPE "public"."tablefunc_crosstab_4" OWNER TO "postgres";

-- ----------------------------
-- Sequence structure for agendas_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."agendas_id_seq";
CREATE SEQUENCE "public"."agendas_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for atlet_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."atlet_id_seq";
CREATE SEQUENCE "public"."atlet_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for customers_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."customers_id_seq";
CREATE SEQUENCE "public"."customers_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for event_categories_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."event_categories_id_seq";
CREATE SEQUENCE "public"."event_categories_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for event_registrations_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."event_registrations_id_seq";
CREATE SEQUENCE "public"."event_registrations_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for events_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."events_id_seq";
CREATE SEQUENCE "public"."events_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for failed_jobs_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."failed_jobs_id_seq";
CREATE SEQUENCE "public"."failed_jobs_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for fresh_chicken_cut_results_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."fresh_chicken_cut_results_id_seq";
CREATE SEQUENCE "public"."fresh_chicken_cut_results_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for galleries_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."galleries_id_seq";
CREATE SEQUENCE "public"."galleries_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for gallery_categories_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."gallery_categories_id_seq";
CREATE SEQUENCE "public"."gallery_categories_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for gallery_images_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."gallery_images_id_seq";
CREATE SEQUENCE "public"."gallery_images_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for invoice_number_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."invoice_number_seq";
CREATE SEQUENCE "public"."invoice_number_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for jabatan_official_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."jabatan_official_id_seq";
CREATE SEQUENCE "public"."jabatan_official_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for jadwal_pertandingan_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."jadwal_pertandingan_id_seq";
CREATE SEQUENCE "public"."jadwal_pertandingan_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for journal_sequence
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."journal_sequence";
CREATE SEQUENCE "public"."journal_sequence" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for kecamatan_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."kecamatan_id_seq";
CREATE SEQUENCE "public"."kecamatan_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for managers_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."managers_id_seq";
CREATE SEQUENCE "public"."managers_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for medals_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."medals_id_seq";
CREATE SEQUENCE "public"."medals_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for menus_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."menus_id_seq";
CREATE SEQUENCE "public"."menus_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for migrations_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."migrations_id_seq";
CREATE SEQUENCE "public"."migrations_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for officials_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."officials_id_seq";
CREATE SEQUENCE "public"."officials_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for parting_cut_result_details_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."parting_cut_result_details_id_seq";
CREATE SEQUENCE "public"."parting_cut_result_details_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for parting_cut_results_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."parting_cut_results_id_seq";
CREATE SEQUENCE "public"."parting_cut_results_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for partings_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."partings_id_seq";
CREATE SEQUENCE "public"."partings_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for pengelola_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."pengelola_id_seq";
CREATE SEQUENCE "public"."pengelola_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for permissions_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."permissions_id_seq";
CREATE SEQUENCE "public"."permissions_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for personal_access_tokens_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."personal_access_tokens_id_seq";
CREATE SEQUENCE "public"."personal_access_tokens_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for post_categories_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."post_categories_id_seq";
CREATE SEQUENCE "public"."post_categories_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for posts_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."posts_id_seq";
CREATE SEQUENCE "public"."posts_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for purchase_order_sequence
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."purchase_order_sequence";
CREATE SEQUENCE "public"."purchase_order_sequence" 
INCREMENT 1
MINVALUE  1
MAXVALUE 99999
START 1
CACHE 1
CYCLE ;

-- ----------------------------
-- Sequence structure for purchase_request_sequence
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."purchase_request_sequence";
CREATE SEQUENCE "public"."purchase_request_sequence" 
INCREMENT 1
MINVALUE  1
MAXVALUE 99999
START 1
CACHE 1
CYCLE ;

-- ----------------------------
-- Sequence structure for rayon_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."rayon_id_seq";
CREATE SEQUENCE "public"."rayon_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for rayon_kecamatan_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."rayon_kecamatan_id_seq";
CREATE SEQUENCE "public"."rayon_kecamatan_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for role_menu_access_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."role_menu_access_id_seq";
CREATE SEQUENCE "public"."role_menu_access_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for sport_classes_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."sport_classes_id_seq";
CREATE SEQUENCE "public"."sport_classes_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for sports_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."sports_id_seq";
CREATE SEQUENCE "public"."sports_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for sub_rayon_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."sub_rayon_id_seq";
CREATE SEQUENCE "public"."sub_rayon_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for transaction_code_sequence
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."transaction_code_sequence";
CREATE SEQUENCE "public"."transaction_code_sequence" 
INCREMENT 1
MINVALUE  1
MAXVALUE 99999
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for user_groups_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."user_groups_id_seq";
CREATE SEQUENCE "public"."user_groups_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for users_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."users_id_seq";
CREATE SEQUENCE "public"."users_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Table structure for agendas
-- ----------------------------
DROP TABLE IF EXISTS "public"."agendas";
CREATE TABLE "public"."agendas" (
  "id" int8 NOT NULL DEFAULT nextval('agendas_id_seq'::regclass),
  "title" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "description" text COLLATE "pg_catalog"."default",
  "agenda_date" date NOT NULL,
  "start_time" time(6),
  "end_time" time(6),
  "location" varchar(255) COLLATE "pg_catalog"."default",
  "created_by" int8,
  "created_at" timestamp(6) DEFAULT CURRENT_TIMESTAMP,
  "updated_at" timestamp(6) DEFAULT CURRENT_TIMESTAMP
)
;

-- ----------------------------
-- Records of agendas
-- ----------------------------
INSERT INTO "public"."agendas" VALUES (2, 'Pekan Olahraga Pelajar', 'Kompetisi olahraga pelajar tingkat kabupaten Bandung', '2025-07-16', NULL, NULL, 'GOR Sabilulungan', NULL, '2025-07-02 21:43:27', '2025-07-02 23:12:24');

-- ----------------------------
-- Table structure for atlet
-- ----------------------------
DROP TABLE IF EXISTS "public"."atlet";
CREATE TABLE "public"."atlet" (
  "id" int4 NOT NULL DEFAULT nextval('atlet_id_seq'::regclass),
  "nama_lengkap" varchar(150) COLLATE "pg_catalog"."default",
  "tempat_lahir" varchar(100) COLLATE "pg_catalog"."default",
  "tanggal_lahir" date,
  "jenis_kelamin" varchar(20) COLLATE "pg_catalog"."default",
  "nama_sekolah" varchar(150) COLLATE "pg_catalog"."default",
  "nisn" varchar(50) COLLATE "pg_catalog"."default",
  "pas_foto" varchar(255) COLLATE "pg_catalog"."default",
  "raport" varchar(255) COLLATE "pg_catalog"."default",
  "akta_lahir" varchar(255) COLLATE "pg_catalog"."default",
  "cabang_olahraga_id" int4,
  "kelas_id" int4,
  "created_at" timestamp(6) DEFAULT CURRENT_TIMESTAMP,
  "updated_at" timestamp(6) DEFAULT CURRENT_TIMESTAMP,
  "appr_status" int2,
  "appr_date" timestamp(6),
  "created_by" int2,
  "appr_notes" text COLLATE "pg_catalog"."default",
  "event_reg_id" int4,
  "sk" varchar(255) COLLATE "pg_catalog"."default",
  "perolehan_medali" int4
)
;

-- ----------------------------
-- Records of atlet
-- ----------------------------
INSERT INTO "public"."atlet" VALUES (58, 'Defran Purnama', 'Ciwidey', '2025-08-11', 'L', 'SMP SALOPA', '13242526', NULL, 'uploads/atlets/raport/L2Ep1gMtTvzvTw1MVCD1ISJGyjJNkwiXmzRnJ03J.pdf', 'uploads/atlets/akta_lahir/r1aRhDXDMBaM8KWVAK6tch2Q4byywKZEywgsC5Cb.pdf', 2, 10, '2025-08-11 22:33:46', '2025-08-11 22:33:46', 1, '2025-08-11 22:33:46', 1125, NULL, 20, 'uploads/atlets/sk/3PZibvTrgaxtoKI7BpWPcfWM5ACDGcEDEg3cJTu5.pdf', NULL);
INSERT INTO "public"."atlet" VALUES (59, 'Jhonathan', 'Tasimalaya', '2025-08-11', 'L', 'SMP Singaparna', '6363737', NULL, 'uploads/atlets/raport/vvYqfpE4ram8MQAqnEVrcEZMbKjEQIO6cyHRgY5k.pdf', 'uploads/atlets/akta_lahir/vyQwBcW29wdoE3nRN17AfoYeldxLgdFEaVD5ihzA.pdf', 2, 10, '2025-08-11 22:33:46', '2025-08-11 22:33:46', 1, '2025-08-11 22:33:46', 1125, NULL, 20, 'uploads/atlets/sk/LXvtEfU7MDUPzgCB385sUCjj3gg4lbPwt0fW1awk.pdf', NULL);
INSERT INTO "public"."atlet" VALUES (51, 'Muhammad Alif', 'Jakarta', '2025-08-08', 'L', 'SMP Singgasari Jakarta', '112345', 'uploads/atlets/pas_foto/uon83FafSD2UviagDoDZB610ATsfCxFcqplLyq2s.jpg', 'uploads/atlets/raport/CzGGFUDaWuSTcnRvXZS3kSQiKfkcpcf8T7Ee85yC.pdf', 'uploads/atlets/akta_lahir/euZ5D92RLb5jZXHlvvgen02rR2Kr80zIoxq40Ve8.pdf', 16, NULL, '2025-08-08 13:37:23', '2025-08-08 13:37:23', 0, '2025-08-08 15:57:27', 1126, 'trtrtr', 15, 'uploads/atlets/sk/Po4rNhT0blJST75004jXiMnCgv0jMCS0ggni0loE.pdf', NULL);
INSERT INTO "public"."atlet" VALUES (53, 'Syahreza Haraphap', 'Bekasi', '2025-08-14', 'L', 'SMP Singaperbangsa Bekasi II', 'Waiting Approval', 'atlets/pas_foto/a7HXNegofjE39RvHwD5Q6G2wFq1aDzEInZunTcnK.jpg', 'uploads/atlets/raport/cZNgzOOF9qtTLDphIbrSFdi9HpvXSRyU1lYU43N8.pdf', 'uploads/atlets/akta_lahir/ILX9jNzniJ8mHMrXoJpzBknKl4UiL6u1cveQxHyV.pdf', 16, NULL, '2025-08-08 13:37:23', '2025-08-08 13:58:42', 1, '2025-08-08 16:07:06', 1126, NULL, 15, 'uploads/atlets/sk/5REMIBUyrUFiFgi3aabavecC2k3UBB2znjnocUWB.pdf', NULL);
INSERT INTO "public"."atlet" VALUES (52, 'Satria Nugraha', 'Bekasi', '2016-02-09', 'L', 'SMP Bekasi 2', '44567677', NULL, 'uploads/atlets/raport/FDnLJdoE5FBFV900gjbiBXZkL281fUn510hUlECe.pdf', 'uploads/atlets/akta_lahir/M2Q4DgnEuvu7RpYBVCNPXTAX9XK9SuNFPqtV65GB.pdf', 16, NULL, '2025-08-08 13:37:23', '2025-08-08 14:31:53', 0, '2025-08-08 15:57:03', 1126, 'fddfd', 15, 'uploads/atlets/sk/56Q0yDcHl5xuRyyj92bevDDrngR5dc0GoYBtdFfA.pdf', NULL);
INSERT INTO "public"."atlet" VALUES (54, 'Nurapip', 'Tasikmalaya', '2025-08-11', 'L', 'SMP Singaprna', '123445', 'uploads/atlets/pas_foto/N4rD26vfbyvONPtuGyjuMG4Zi1iG1QohCkYLOG4L.jpg', 'uploads/atlets/raport/87rGUK7GbhDTHJf9K2LKaWvDcuc8OEkC0DcouWUq.pdf', 'uploads/atlets/akta_lahir/UmjqtGTPTGFBf0qv3BOUXPOy0Usa9tHmwJJMhOXJ.pdf', 2, NULL, '2025-08-11 13:26:20', '2025-08-11 13:26:20', NULL, NULL, 1125, NULL, 17, 'uploads/atlets/sk/podaGvnicukdZar138XJYvQrrOoqbMf4S5YBDsPd.pdf', NULL);
INSERT INTO "public"."atlet" VALUES (50, 'Nurapip', 'Tasikmalaya', '2025-08-08', 'L', 'SDN Sukanampa', 'Rejected', 'atlets/pas_foto/30vWDYdIMtoCYSzs9Bkm9S2v68xBt5tUF119fTZt.jpg', 'uploads/atlets/raport/QAB4Vhw6g2vxkLuHRw57rd8lxF5tmGxmB5xs5lVD.pdf', 'uploads/atlets/akta_lahir/Hh2d7S25CeM0ZiV7rCTdhebwKaoir34XtRniqbJN.pdf', 2, 8, '2025-08-08 11:16:03', '2025-08-08 13:30:38', 0, '2025-08-08 13:27:30', 1126, 'Dokument tidak lengkap', 14, 'uploads/atlets/sk/KMAZ40R8gfdqbm9gp7AxVABzDemOZHQXEj0BadmG.pdf', NULL);
INSERT INTO "public"."atlet" VALUES (55, 'Muhammad Alif', 'Jakarta', '1987-02-12', 'L', 'SMP Singaraja', '123425', 'uploads/atlets/pas_foto/1Qolz4TiRCt0yjBP9Y2ZpHjrQzse1cTddU4DYgRc.jpg', 'uploads/atlets/raport/Igrft5CqoNTSx14brEIt8hdRCmoEh3QdHeHwbTuH.pdf', 'uploads/atlets/akta_lahir/dPhWSKDxhu2yRmizLxmWHydgiCXH87gXauiCukr7.pdf', 1, 20, '2025-08-11 13:29:27', '2025-08-11 13:29:27', NULL, NULL, 1125, NULL, 18, 'uploads/atlets/sk/6SCu8uB8Nse8CQFKFH1NF9ENrgntp2uTZaQ9x8XT.pdf', NULL);
INSERT INTO "public"."atlet" VALUES (56, 'Ahmad Syahrul', 'Jakarta', '2011-01-11', 'L', 'SMP Singaraha', '433434', 'uploads/atlets/pas_foto/SOjMqxpbXn5ADdmUqOoPykQAJztap2lLtZyXg3sZ.jpg', 'uploads/atlets/raport/i9U0Kwj98OlBz8YLI5jelqrsE33CcbrNpLmhKImQ.pdf', 'uploads/atlets/akta_lahir/ldgv1eG64uZHfj2jC8hrx3qgg6NYgRYrSaIZvS4p.pdf', 1, 20, '2025-08-11 13:29:27', '2025-08-11 13:29:27', NULL, NULL, 1125, NULL, 18, 'uploads/atlets/sk/ypg8dnenULWPG0R9P2NRnnJPQjwSDGpsP1wcRv8N.pdf', NULL);
INSERT INTO "public"."atlet" VALUES (57, 'Jeffry Nichole', 'Tasikmalaya', '2025-08-11', 'L', 'SMP Singarja', '23444', 'uploads/atlets/pas_foto/h6v50r9A7WPplLCWvZAHn1rSp9H5S5PiivlZQmv4.jpg', 'uploads/atlets/raport/2fD1Bj5OTLvIinZTtr1FYuxNIurbJJkdb3Ld8fsU.pdf', 'uploads/atlets/akta_lahir/s8Wg6RFs7FpwlOz5k7dMPoyBlNSIxnuTDi5Acg7L.pdf', 12, NULL, '2025-08-11 13:35:30', '2025-08-11 13:35:30', 1, NULL, 1125, NULL, 19, 'uploads/atlets/sk/RIyppp1Qux4sdoed4wQ1pnvh3gbesKRRd4dA36bt.pdf', NULL);

-- ----------------------------
-- Table structure for event_categories
-- ----------------------------
DROP TABLE IF EXISTS "public"."event_categories";
CREATE TABLE "public"."event_categories" (
  "id" int4 NOT NULL DEFAULT nextval('event_categories_id_seq'::regclass),
  "name" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "description" text COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of event_categories
-- ----------------------------
INSERT INTO "public"."event_categories" VALUES (1, 'O2SN', 'OLIMPIADE OLAHRAGA SISWA NASIONAL (O2SN)');
INSERT INTO "public"."event_categories" VALUES (2, 'POPDA', 'PEKAN OLAHRAGA PELAJAR DAERAH');
INSERT INTO "public"."event_categories" VALUES (3, 'POPWILL', 'PEKAN OLAHRAGA WILAYAH');

-- ----------------------------
-- Table structure for event_registrations
-- ----------------------------
DROP TABLE IF EXISTS "public"."event_registrations";
CREATE TABLE "public"."event_registrations" (
  "id" int8 NOT NULL DEFAULT nextval('event_registrations_id_seq'::regclass),
  "event_id" int8 NOT NULL,
  "manager_id" int8,
  "approved_by" int8,
  "approved_at" timestamp(6),
  "created_at" timestamp(6) DEFAULT CURRENT_TIMESTAMP,
  "updated_at" timestamp(6) DEFAULT CURRENT_TIMESTAMP,
  "appr_status" int2,
  "sport_id" int2,
  "sport_class_id" int2,
  "kecamatan_id" int4,
  "sub_rayon_id" int4,
  "jenjang" varchar(255) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of event_registrations
-- ----------------------------
INSERT INTO "public"."event_registrations" VALUES (14, 7, 3, NULL, NULL, '2025-08-08 11:16:02', '2025-08-08 13:30:38', NULL, 2, NULL, 1, 3, 'SD');
INSERT INTO "public"."event_registrations" VALUES (15, 7, 3, NULL, NULL, '2025-08-08 13:37:23', '2025-08-08 14:31:53', NULL, 16, NULL, 1, 3, 'SMP');
INSERT INTO "public"."event_registrations" VALUES (17, 8, NULL, NULL, NULL, '2025-08-11 13:26:19', '2025-08-11 13:26:19', NULL, 2, NULL, NULL, NULL, NULL);
INSERT INTO "public"."event_registrations" VALUES (18, 9, NULL, NULL, NULL, '2025-08-11 13:29:27', '2025-08-11 13:29:27', NULL, 1, 20, NULL, NULL, NULL);
INSERT INTO "public"."event_registrations" VALUES (19, 8, NULL, NULL, NULL, '2025-08-11 13:35:29', '2025-08-11 13:35:29', NULL, 12, NULL, NULL, NULL, NULL);
INSERT INTO "public"."event_registrations" VALUES (20, 8, NULL, NULL, NULL, '2025-08-11 22:33:46', '2025-08-11 22:33:46', NULL, 2, 10, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for events
-- ----------------------------
DROP TABLE IF EXISTS "public"."events";
CREATE TABLE "public"."events" (
  "id" int8 NOT NULL DEFAULT nextval('events_id_seq'::regclass),
  "name" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "description" text COLLATE "pg_catalog"."default",
  "start_date" date NOT NULL,
  "end_date" date NOT NULL,
  "location" varchar(255) COLLATE "pg_catalog"."default",
  "created_at" timestamp(6) DEFAULT CURRENT_TIMESTAMP,
  "updated_at" timestamp(6) DEFAULT CURRENT_TIMESTAMP,
  "event_category_id" int4,
  "status" int4,
  "year" int4,
  "reg_status" int4 DEFAULT 0,
  "open_reg_date" date,
  "close_reg_date" date
)
;

-- ----------------------------
-- Records of events
-- ----------------------------
INSERT INTO "public"."events" VALUES (7, 'O2SN XIII 2025', 'O2SN XIII 2025', '2025-08-01', '2025-09-30', 'Kabupaten Bandung', '2025-08-06 09:46:30', '2025-08-06 12:35:07', 1, 1, 2025, 1, '2025-08-01', '2025-09-30');
INSERT INTO "public"."events" VALUES (8, 'POPDA XVI 2025', 'POPDA XVI 2025', '2025-08-01', '2025-09-30', 'Kabupaten Bandung', '2025-08-06 12:39:23', '2025-08-06 12:39:23.530573', 2, 1, 2025, 0, '2025-08-01', '2025-09-30');
INSERT INTO "public"."events" VALUES (9, 'POPWIL XII 2025', 'POPWIL XII 2025', '2025-08-01', '2025-09-30', 'Kabupaten Bandung', '2025-08-06 12:41:45', '2025-08-06 12:41:45.941959', 3, 1, 2025, 0, '2025-08-01', '2025-09-30');

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS "public"."failed_jobs";
CREATE TABLE "public"."failed_jobs" (
  "id" int8 NOT NULL DEFAULT nextval('failed_jobs_id_seq'::regclass),
  "uuid" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "connection" text COLLATE "pg_catalog"."default" NOT NULL,
  "queue" text COLLATE "pg_catalog"."default" NOT NULL,
  "payload" text COLLATE "pg_catalog"."default" NOT NULL,
  "exception" text COLLATE "pg_catalog"."default" NOT NULL,
  "failed_at" timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP
)
;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for galleries
-- ----------------------------
DROP TABLE IF EXISTS "public"."galleries";
CREATE TABLE "public"."galleries" (
  "id" int4 NOT NULL DEFAULT nextval('galleries_id_seq'::regclass),
  "title" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "description" text COLLATE "pg_catalog"."default",
  "category_id" int4,
  "image_url" varchar(500) COLLATE "pg_catalog"."default",
  "created_by" int4,
  "created_at" timestamp(6) DEFAULT CURRENT_TIMESTAMP,
  "updated_at" timestamp(6) DEFAULT CURRENT_TIMESTAMP
)
;

-- ----------------------------
-- Records of galleries
-- ----------------------------
INSERT INTO "public"."galleries" VALUES (6, 'Kegiatan Olahraga Test', 'Kegiatan olahraga yang diselenggarakan oleh panitia', 2, 'uploads/galleries/YwcE6ZHuCEOmZeFPjXI1QIJQm6bmctIuUxuQvVQa.jpg', NULL, '2025-07-07 20:52:02.146035', '2025-07-07 20:52:02.146035');
INSERT INTO "public"."galleries" VALUES (7, 'Jakarta Electric PLN Amankan Tiket Final Four PLN Mobile Proliga 2025, Ini Ulasannya', 'Jakarta Electric PLN Amankan Tiket Final Four PLN Mobile Proliga 2025, Ini Ulasannya', 2, 'uploads/galleries/b6Ahf9iOrHNzK7VwBPbmFsUl40L1u8LJIogHDjxG.jpg', NULL, '2025-07-19 22:59:00.205698', '2025-07-19 22:59:00.205698');
INSERT INTO "public"."galleries" VALUES (8, 'Ogah Cabut, Si Kaki Kaca Kirim Peringatan ke Rekrutan Baru Real Madrid', 'Ogah Cabut, Si Kaki Kaca Kirim Peringatan ke Rekrutan Baru Real Madrid', 2, 'uploads/galleries/3wtfZmLTgO28fsozwwOVzJ6h6KNaFWmL2J6wvkV9.jpg', NULL, '2025-07-31 16:27:02.72388', '2025-07-31 16:27:02.72388');
INSERT INTO "public"."galleries" VALUES (9, 'Barcelona di Ambang Cuan, The Next David Villa Diincar Klub Sultan', 'Barcelona di Ambang Cuan, The Next David Villa Diincar Klub Sultan', 2, 'uploads/galleries/r8L1vGzeuvVCu24e17T6MX0Pwfff5kXlKgrvaGaD.jpg', NULL, '2025-07-31 16:27:54.49679', '2025-07-31 16:27:54.49679');

-- ----------------------------
-- Table structure for gallery_categories
-- ----------------------------
DROP TABLE IF EXISTS "public"."gallery_categories";
CREATE TABLE "public"."gallery_categories" (
  "id" int4 NOT NULL DEFAULT nextval('gallery_categories_id_seq'::regclass),
  "name" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "slug" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "created_at" timestamp(6) DEFAULT CURRENT_TIMESTAMP,
  "updated_at" timestamp(6) DEFAULT CURRENT_TIMESTAMP
)
;

-- ----------------------------
-- Records of gallery_categories
-- ----------------------------
INSERT INTO "public"."gallery_categories" VALUES (2, 'Tournament', '-', '2025-06-24 19:47:01.589467', '2025-06-24 19:47:01.589467');

-- ----------------------------
-- Table structure for gallery_images
-- ----------------------------
DROP TABLE IF EXISTS "public"."gallery_images";
CREATE TABLE "public"."gallery_images" (
  "id" int4 NOT NULL DEFAULT nextval('gallery_images_id_seq'::regclass),
  "gallery_id" int4,
  "image_url" varchar(500) COLLATE "pg_catalog"."default" NOT NULL,
  "caption" varchar(255) COLLATE "pg_catalog"."default",
  "created_at" timestamp(6) DEFAULT CURRENT_TIMESTAMP
)
;

-- ----------------------------
-- Records of gallery_images
-- ----------------------------

-- ----------------------------
-- Table structure for group_menu_access
-- ----------------------------
DROP TABLE IF EXISTS "public"."group_menu_access";
CREATE TABLE "public"."group_menu_access" (
  "id" int4 NOT NULL DEFAULT nextval('role_menu_access_id_seq'::regclass),
  "group_id" int4,
  "menu_id" int4,
  "created_at" timestamp(6) DEFAULT CURRENT_TIMESTAMP,
  "updated_at" timestamp(6) DEFAULT CURRENT_TIMESTAMP,
  "can_view" int4,
  "can_edit" int4,
  "can_delete" int4
)
;

-- ----------------------------
-- Records of group_menu_access
-- ----------------------------
INSERT INTO "public"."group_menu_access" VALUES (173, 1, 92, '2025-06-16 22:00:52.589061', '2025-06-16 22:00:52.589061', NULL, NULL, NULL);
INSERT INTO "public"."group_menu_access" VALUES (174, 1, 93, '2025-06-16 22:00:52.939853', '2025-06-16 22:00:52.939853', NULL, NULL, NULL);
INSERT INTO "public"."group_menu_access" VALUES (175, 1, 94, '2025-06-16 22:02:24.494123', '2025-06-16 22:02:24.494123', NULL, NULL, NULL);
INSERT INTO "public"."group_menu_access" VALUES (176, 1, 95, '2025-06-16 22:02:27.207195', '2025-06-16 22:02:27.207195', NULL, NULL, NULL);
INSERT INTO "public"."group_menu_access" VALUES (177, 1, 96, '2025-06-16 22:02:29.806915', '2025-06-16 22:02:29.806915', NULL, NULL, NULL);
INSERT INTO "public"."group_menu_access" VALUES (178, 1, 97, '2025-06-16 23:22:29.0933', '2025-06-16 23:22:29.0933', NULL, NULL, NULL);
INSERT INTO "public"."group_menu_access" VALUES (179, 1, 98, '2025-06-16 23:22:29.6526', '2025-06-16 23:22:29.6526', NULL, NULL, NULL);
INSERT INTO "public"."group_menu_access" VALUES (180, 1, 99, '2025-06-16 23:22:31.424499', '2025-06-16 23:22:31.424499', NULL, NULL, NULL);
INSERT INTO "public"."group_menu_access" VALUES (181, 1, 100, '2025-06-17 10:14:26.28861', '2025-06-17 10:14:26.28861', NULL, NULL, NULL);
INSERT INTO "public"."group_menu_access" VALUES (182, 1, 101, '2025-06-17 10:14:29.688821', '2025-06-17 10:14:29.688821', NULL, NULL, NULL);
INSERT INTO "public"."group_menu_access" VALUES (183, 1, 102, '2025-06-17 10:15:47.445339', '2025-06-17 10:15:47.445339', NULL, NULL, NULL);
INSERT INTO "public"."group_menu_access" VALUES (184, 1, 103, '2025-06-17 20:04:37.82201', '2025-06-17 20:04:37.82201', NULL, NULL, NULL);
INSERT INTO "public"."group_menu_access" VALUES (185, 1, 104, '2025-06-17 20:04:40.413961', '2025-06-17 20:04:40.413961', NULL, NULL, NULL);
INSERT INTO "public"."group_menu_access" VALUES (187, 1, 106, '2025-06-19 01:41:35.128255', '2025-06-19 01:41:35.128255', NULL, NULL, NULL);
INSERT INTO "public"."group_menu_access" VALUES (188, 1, 107, '2025-06-19 17:21:40.160059', '2025-06-19 17:21:40.160059', NULL, NULL, NULL);
INSERT INTO "public"."group_menu_access" VALUES (190, 1, 109, '2025-06-20 23:50:57.480452', '2025-06-20 23:50:57.480452', NULL, NULL, NULL);
INSERT INTO "public"."group_menu_access" VALUES (191, 1, 110, '2025-06-26 09:24:39.759399', '2025-06-26 09:24:39.759399', NULL, NULL, NULL);
INSERT INTO "public"."group_menu_access" VALUES (192, 15, 92, '2025-06-26 10:15:21.504633', '2025-06-26 10:15:21.504633', NULL, NULL, NULL);
INSERT INTO "public"."group_menu_access" VALUES (193, 15, 102, '2025-06-26 10:15:24.617717', '2025-06-26 10:15:24.617717', NULL, NULL, NULL);
INSERT INTO "public"."group_menu_access" VALUES (194, 15, 107, '2025-06-26 10:15:29.603397', '2025-06-26 10:15:29.603397', NULL, NULL, NULL);
INSERT INTO "public"."group_menu_access" VALUES (196, 1, 111, '2025-07-02 21:33:54.781451', '2025-07-02 21:33:54.781451', NULL, NULL, NULL);
INSERT INTO "public"."group_menu_access" VALUES (197, 1, 112, '2025-07-03 00:04:47.726349', '2025-07-03 00:04:47.726349', NULL, NULL, NULL);
INSERT INTO "public"."group_menu_access" VALUES (199, 1, 115, '2025-07-03 20:43:42.017284', '2025-07-03 20:43:42.017284', NULL, NULL, NULL);
INSERT INTO "public"."group_menu_access" VALUES (200, 15, 115, '2025-07-05 11:10:05.518869', '2025-07-05 11:10:05.518869', NULL, NULL, NULL);
INSERT INTO "public"."group_menu_access" VALUES (202, 1, 116, '2025-07-07 15:19:16.993173', '2025-07-07 15:19:16.993173', NULL, NULL, NULL);
INSERT INTO "public"."group_menu_access" VALUES (203, 14, 92, '2025-07-07 15:19:38.09071', '2025-07-07 15:19:38.09071', NULL, NULL, NULL);
INSERT INTO "public"."group_menu_access" VALUES (204, 14, 102, '2025-07-07 15:19:39.936348', '2025-07-07 15:19:39.936348', NULL, NULL, NULL);
INSERT INTO "public"."group_menu_access" VALUES (205, 14, 103, '2025-07-07 15:19:42.873498', '2025-07-07 15:19:42.873498', NULL, NULL, NULL);
INSERT INTO "public"."group_menu_access" VALUES (206, 14, 104, '2025-07-07 15:19:45.014191', '2025-07-07 15:19:45.014191', NULL, NULL, NULL);
INSERT INTO "public"."group_menu_access" VALUES (207, 14, 110, '2025-07-07 15:19:48.515113', '2025-07-07 15:19:48.515113', NULL, NULL, NULL);
INSERT INTO "public"."group_menu_access" VALUES (208, 14, 116, '2025-07-07 15:19:51.086263', '2025-07-07 15:19:51.086263', NULL, NULL, NULL);
INSERT INTO "public"."group_menu_access" VALUES (209, 16, 92, '2025-07-07 15:20:07.8755', '2025-07-07 15:20:07.8755', NULL, NULL, NULL);
INSERT INTO "public"."group_menu_access" VALUES (210, 16, 102, '2025-07-07 15:20:09.189288', '2025-07-07 15:20:09.189288', NULL, NULL, NULL);
INSERT INTO "public"."group_menu_access" VALUES (211, 16, 107, '2025-07-07 15:20:14.368585', '2025-07-07 15:20:14.368585', NULL, NULL, NULL);
INSERT INTO "public"."group_menu_access" VALUES (213, 1, 117, '2025-07-20 11:29:49.326134', '2025-07-20 11:29:49.326134', NULL, NULL, NULL);
INSERT INTO "public"."group_menu_access" VALUES (214, 1, 118, '2025-08-06 14:56:14.184951', '2025-08-06 14:56:14.184951', NULL, NULL, NULL);
INSERT INTO "public"."group_menu_access" VALUES (215, 1, 119, '2025-08-07 16:46:37.327817', '2025-08-07 16:46:37.327817', NULL, NULL, NULL);
INSERT INTO "public"."group_menu_access" VALUES (216, 16, 115, '2025-08-11 13:17:17.761455', '2025-08-11 13:17:17.761455', NULL, NULL, NULL);
INSERT INTO "public"."group_menu_access" VALUES (217, 16, 118, '2025-08-11 13:17:21.546698', '2025-08-11 13:17:21.546698', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for groups
-- ----------------------------
DROP TABLE IF EXISTS "public"."groups";
CREATE TABLE "public"."groups" (
  "id" int8 NOT NULL DEFAULT nextval('user_groups_id_seq'::regclass),
  "code" varchar(50) COLLATE "pg_catalog"."default" NOT NULL,
  "name" varchar(100) COLLATE "pg_catalog"."default",
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;

-- ----------------------------
-- Records of groups
-- ----------------------------
INSERT INTO "public"."groups" VALUES (14, 'AD', 'ADMIN', NULL, NULL);
INSERT INTO "public"."groups" VALUES (16, 'ACO', 'ADMIN CABANG OLAHRAGA', NULL, NULL);
INSERT INTO "public"."groups" VALUES (15, 'AP', 'ADMIN PENGELOLA', NULL, NULL);
INSERT INTO "public"."groups" VALUES (1, 'SA', 'SUPERADMIN', NULL, NULL);

-- ----------------------------
-- Table structure for jabatan_official
-- ----------------------------
DROP TABLE IF EXISTS "public"."jabatan_official";
CREATE TABLE "public"."jabatan_official" (
  "id" int4 NOT NULL DEFAULT nextval('jabatan_official_id_seq'::regclass),
  "nama_jabatan" varchar(100) COLLATE "pg_catalog"."default" NOT NULL
)
;

-- ----------------------------
-- Records of jabatan_official
-- ----------------------------
INSERT INTO "public"."jabatan_official" VALUES (1, 'Manajer Tim (Team Manager)');
INSERT INTO "public"."jabatan_official" VALUES (2, 'Pelatih (Coach)');
INSERT INTO "public"."jabatan_official" VALUES (3, 'Dokter Tim (Team Doctor)');
INSERT INTO "public"."jabatan_official" VALUES (4, 'Fisioterapis (Physiotherapist)');
INSERT INTO "public"."jabatan_official" VALUES (5, 'Asisten Pelatih (Assistant Coach)');

-- ----------------------------
-- Table structure for jadwal_pertandingan
-- ----------------------------
DROP TABLE IF EXISTS "public"."jadwal_pertandingan";
CREATE TABLE "public"."jadwal_pertandingan" (
  "id" int4 NOT NULL DEFAULT nextval('jadwal_pertandingan_id_seq'::regclass),
  "tanggal" date,
  "waktu" time(6),
  "event_id" int4,
  "cabor_id" int4,
  "nomor_pertandingan" int4,
  "kategori" varchar(50) COLLATE "pg_catalog"."default",
  "status" varchar(50) COLLATE "pg_catalog"."default" DEFAULT 'Belum Dimulai'::character varying,
  "created_at" timestamp(6) DEFAULT CURRENT_TIMESTAMP,
  "updated_at" timestamp(6) DEFAULT CURRENT_TIMESTAMP,
  "tempat" text COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of jadwal_pertandingan
-- ----------------------------
INSERT INTO "public"."jadwal_pertandingan" VALUES (1, '2025-07-19', '19:32:28', 8, 1, 1, 'Pi', '1', '2025-07-19 19:33:18.192494', '2025-07-19 19:33:18.192494', 'GOR Jalak Harupat');
INSERT INTO "public"."jadwal_pertandingan" VALUES (5, '2025-08-07', NULL, 8, 1, 18, 'Pi', '1', '2025-08-07 14:55:25', '2025-08-07 14:55:25.446083', 'Lapang Tembak Cimahi');
INSERT INTO "public"."jadwal_pertandingan" VALUES (6, '2025-08-28', NULL, 7, 18, 32, 'Pi', '1', '2025-08-07 14:57:16', '2025-08-07 14:57:16.555424', 'Lapang Tembak Cimahi');

-- ----------------------------
-- Table structure for kecamatan
-- ----------------------------
DROP TABLE IF EXISTS "public"."kecamatan";
CREATE TABLE "public"."kecamatan" (
  "id" int4 NOT NULL DEFAULT nextval('kecamatan_id_seq'::regclass),
  "kode" varchar(20) COLLATE "pg_catalog"."default",
  "nama" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "rayon_id" int4
)
;

-- ----------------------------
-- Records of kecamatan
-- ----------------------------
INSERT INTO "public"."kecamatan" VALUES (1, '32.04.16', 'ARJASARI', NULL);
INSERT INTO "public"."kecamatan" VALUES (2, '32.04.32', 'BALEENDAH', NULL);
INSERT INTO "public"."kecamatan" VALUES (3, '32.04.13', 'BANJARAN', NULL);
INSERT INTO "public"."kecamatan" VALUES (4, '32.04.08', 'BOJONGSOANG', NULL);
INSERT INTO "public"."kecamatan" VALUES (5, '32.04.44', 'CANGKUANG', NULL);
INSERT INTO "public"."kecamatan" VALUES (6, '32.04.25', 'CICALENGKA', NULL);
INSERT INTO "public"."kecamatan" VALUES (7, '32.04.27', 'CIKANCUNG', NULL);
INSERT INTO "public"."kecamatan" VALUES (8, '32.04.07', 'CILENGKRANG', NULL);
INSERT INTO "public"."kecamatan" VALUES (9, '32.04.05', 'CILEUNYI', NULL);
INSERT INTO "public"."kecamatan" VALUES (10, '32.04.17', 'CIMAUNG', NULL);
INSERT INTO "public"."kecamatan" VALUES (11, '32.04.06', 'CIMENYAN', NULL);
INSERT INTO "public"."kecamatan" VALUES (12, '32.04.29', 'CIPARAY', NULL);
INSERT INTO "public"."kecamatan" VALUES (13, '32.04.39', 'CIWIDEY', NULL);
INSERT INTO "public"."kecamatan" VALUES (14, '32.04.12', 'DAYEUHKOLOT', NULL);
INSERT INTO "public"."kecamatan" VALUES (15, '32.04.36', 'IBUN', NULL);
INSERT INTO "public"."kecamatan" VALUES (16, '32.04.11', 'KATAPANG', NULL);
INSERT INTO "public"."kecamatan" VALUES (17, '32.04.31', 'KERTASARI', NULL);
INSERT INTO "public"."kecamatan" VALUES (18, '32.04.46', 'KUTAWARINGIN', NULL);
INSERT INTO "public"."kecamatan" VALUES (19, '32.04.33', 'MAJALAYA', NULL);
INSERT INTO "public"."kecamatan" VALUES (20, '32.04.10', 'MARGAASIH', NULL);
INSERT INTO "public"."kecamatan" VALUES (21, '32.04.09', 'MARGAHAYU', NULL);
INSERT INTO "public"."kecamatan" VALUES (22, '32.04.26', 'NAGREG', NULL);
INSERT INTO "public"."kecamatan" VALUES (23, '32.04.30', 'PACET', NULL);
INSERT INTO "public"."kecamatan" VALUES (24, '32.04.14', 'PAMENGPEUK', NULL);
INSERT INTO "public"."kecamatan" VALUES (25, '32.04.15', 'PANGALENGAN', NULL);
INSERT INTO "public"."kecamatan" VALUES (26, '32.04.35', 'PASEH', NULL);
INSERT INTO "public"."kecamatan" VALUES (27, '32.04.38', 'PASIRJAMBU', NULL);
INSERT INTO "public"."kecamatan" VALUES (28, '32.04.40', 'RANCABALI', NULL);
INSERT INTO "public"."kecamatan" VALUES (29, '32.04.28', 'RANCAEKEK', NULL);
INSERT INTO "public"."kecamatan" VALUES (30, '32.04.34', 'SOLOKANJERUK', NULL);
INSERT INTO "public"."kecamatan" VALUES (31, '32.04.37', 'SOREANG', NULL);

-- ----------------------------
-- Table structure for managers
-- ----------------------------
DROP TABLE IF EXISTS "public"."managers";
CREATE TABLE "public"."managers" (
  "id" int8 NOT NULL DEFAULT nextval('managers_id_seq'::regclass),
  "name" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "email" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "password" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "kecamatan_id" int8 NOT NULL,
  "sub_rayon_id" int8 NOT NULL,
  "user_id" int8 NOT NULL
)
;

-- ----------------------------
-- Records of managers
-- ----------------------------
INSERT INTO "public"."managers" VALUES (3, 'Dimas Sulistyo', 'dimas.sulistyo@gmail.com', '$2y$10$0sGb2Mezwf6htJTb0Scr1e800g2INR6XewAZbOmIoqpqZzPzSlKRm', 1, 3, 1126);

-- ----------------------------
-- Table structure for medals
-- ----------------------------
DROP TABLE IF EXISTS "public"."medals";
CREATE TABLE "public"."medals" (
  "id" int8 NOT NULL DEFAULT nextval('medals_id_seq'::regclass),
  "atlet_id" int8 NOT NULL,
  "sport_category" varchar(100) COLLATE "pg_catalog"."default",
  "medal_type" varchar(10) COLLATE "pg_catalog"."default",
  "created_at" timestamp(6) DEFAULT CURRENT_TIMESTAMP,
  "updated_at" timestamp(6) DEFAULT CURRENT_TIMESTAMP,
  "event" varchar(225) COLLATE "pg_catalog"."default",
  "tahun" varchar(255) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of medals
-- ----------------------------

-- ----------------------------
-- Table structure for menus
-- ----------------------------
DROP TABLE IF EXISTS "public"."menus";
CREATE TABLE "public"."menus" (
  "id" int4 NOT NULL DEFAULT nextval('menus_id_seq'::regclass),
  "parent_id" int4,
  "name" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "url" varchar(255) COLLATE "pg_catalog"."default",
  "icon" varchar(255) COLLATE "pg_catalog"."default",
  "order" int4 NOT NULL DEFAULT 0,
  "created_at" timestamp(6) DEFAULT CURRENT_TIMESTAMP,
  "updated_at" timestamp(6) DEFAULT CURRENT_TIMESTAMP,
  "is_active" int2
)
;

-- ----------------------------
-- Records of menus
-- ----------------------------
INSERT INTO "public"."menus" VALUES (92, NULL, 'Dashboard', 'dashboards/store', '<i class="fa-solid fa-database"></i>', 1, '2025-06-16 21:59:10.350795', '2025-06-16 21:59:10.350795', 1);
INSERT INTO "public"."menus" VALUES (94, 93, 'Users', 'users', '<i class="fa-solid fa-database"></i>', 1, '2025-06-16 22:01:32.271651', '2025-06-16 22:01:32.271651', 1);
INSERT INTO "public"."menus" VALUES (95, 93, 'Groups', 'groups', '<i class="fa-solid fa-database"></i>', 2, '2025-06-16 22:01:51.861783', '2025-06-16 22:01:51.861783', 1);
INSERT INTO "public"."menus" VALUES (96, 93, 'Menus', 'menus', '<i class="fa-solid fa-database"></i>', 3, '2025-06-16 22:02:10.768677', '2025-06-16 22:02:10.768677', 1);
INSERT INTO "public"."menus" VALUES (98, 97, 'News', 'posts/news', NULL, 1, '2025-06-16 23:21:51.436043', '2025-06-16 23:21:51.436043', 1);
INSERT INTO "public"."menus" VALUES (99, 97, 'Galery', 'posts/galeries', NULL, 2, '2025-06-16 23:22:11.154092', '2025-06-16 23:22:11.154092', 1);
INSERT INTO "public"."menus" VALUES (102, 92, 'General', 'dashboards', NULL, 1, '2025-06-17 10:15:33.960704', '2025-06-17 10:15:33.960704', 1);
INSERT INTO "public"."menus" VALUES (109, 100, 'Rayon', 'rayon', NULL, 3, '2025-06-20 23:50:45.918708', '2025-06-20 23:50:45.918708', 1);
INSERT INTO "public"."menus" VALUES (97, NULL, 'Posts', NULL, '<i class="fa-solid fa-database"></i>', 4, '2025-06-16 23:21:17.660219', '2025-06-16 23:21:17.660219', 1);
INSERT INTO "public"."menus" VALUES (93, NULL, 'Accounts', NULL, '<i class="fa-solid fa-database"></i>', 5, '2025-06-16 22:00:39.165278', '2025-06-16 22:00:39.165278', 1);
INSERT INTO "public"."menus" VALUES (100, NULL, 'Master Data', NULL, '<i class="fa-solid fa-database"></i>', 6, '2025-06-16 23:30:43.572685', '2025-06-16 23:30:43.572685', 1);
INSERT INTO "public"."menus" VALUES (101, 100, 'Cabang Olahraga', 'cabang-olahraga', NULL, 1, '2025-06-16 23:31:15.472022', '2025-06-16 23:31:15.472022', 1);
INSERT INTO "public"."menus" VALUES (105, 100, 'Kecamatan', NULL, NULL, 2, '2025-06-19 01:40:30.43911', '2025-06-19 01:40:30.43911', 1);
INSERT INTO "public"."menus" VALUES (106, 100, 'Sub Rayon', 'sub-rayon', NULL, 3, '2025-06-19 01:41:21.781973', '2025-06-19 01:41:21.781973', 1);
INSERT INTO "public"."menus" VALUES (103, NULL, 'Verifikasi & Approval', NULL, '<i class="fa-solid fa-database"></i>', 3, '2025-06-17 20:03:43.712977', '2025-06-17 20:03:43.712977', 1);
INSERT INTO "public"."menus" VALUES (104, 103, 'Registrasi', 'registrations', NULL, 1, '2025-06-17 20:04:05.895579', '2025-06-17 20:04:05.895579', 1);
INSERT INTO "public"."menus" VALUES (110, 103, 'Verifikasi Atlet', 'athletes', NULL, 2, '2025-06-26 09:24:17.748142', '2025-06-26 09:24:17.748142', 1);
INSERT INTO "public"."menus" VALUES (111, 97, 'Agendas', 'posts/agendas', NULL, 3, '2025-07-02 21:33:42.101445', '2025-07-02 21:33:42.101445', 1);
INSERT INTO "public"."menus" VALUES (112, 100, 'Events', 'events', NULL, 4, '2025-07-03 00:04:27.560786', '2025-07-03 00:04:27.560786', 1);
INSERT INTO "public"."menus" VALUES (116, 103, 'Verifikasi Officials', 'officials', NULL, 3, '2025-07-07 15:18:54.00391', '2025-07-07 15:18:54.00391', 1);
INSERT INTO "public"."menus" VALUES (117, 97, 'Jadwal Pertandingan', 'posts/jadwal', NULL, 4, '2025-07-20 11:27:42.793581', '2025-07-20 11:27:42.793581', 1);
INSERT INTO "public"."menus" VALUES (108, 107, 'POPDA', 'athletes', NULL, 1, '2025-06-19 17:21:22.695673', '2025-06-19 17:21:22.695673', 1);
INSERT INTO "public"."menus" VALUES (113, 107, 'POPWIL', 'officials', NULL, 2, '2025-07-03 00:21:09.759129', '2025-07-03 00:21:09.759129', 1);
INSERT INTO "public"."menus" VALUES (107, NULL, 'Events', NULL, '<i class="fa-solid fa-database"></i>', 6, '2025-06-19 17:20:41.98767', '2025-06-19 17:20:41.98767', 1);
INSERT INTO "public"."menus" VALUES (115, 107, 'Registrations', 'event-registrations', NULL, 0, '2025-07-03 20:43:31.071969', '2025-07-03 20:43:31.071969', 1);
INSERT INTO "public"."menus" VALUES (119, 104, 'Perolehan Medali', 'event-registrations', NULL, 2, '2025-08-07 16:46:19.208696', '2025-08-07 16:46:19.208696', 1);
INSERT INTO "public"."menus" VALUES (118, 107, 'Perolehan Medali', 'perolehan-medali', '<i class="fa-solid fa-database"></i>', 2, '2025-08-06 14:55:03.006564', '2025-08-06 14:55:03.006564', 1);

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS "public"."migrations";
CREATE TABLE "public"."migrations" (
  "id" int4 NOT NULL DEFAULT nextval('migrations_id_seq'::regclass),
  "migration" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "batch" int4 NOT NULL
)
;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO "public"."migrations" VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO "public"."migrations" VALUES (2, '2014_10_12_100000_create_password_reset_tokens_table', 1);
INSERT INTO "public"."migrations" VALUES (3, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO "public"."migrations" VALUES (4, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO "public"."migrations" VALUES (5, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO "public"."migrations" VALUES (6, '2024_09_29_112508_create_user_groups_table', 1);
INSERT INTO "public"."migrations" VALUES (7, '2024_09_29_113257_create_permissions_table', 2);

-- ----------------------------
-- Table structure for officials
-- ----------------------------
DROP TABLE IF EXISTS "public"."officials";
CREATE TABLE "public"."officials" (
  "id" int4 NOT NULL DEFAULT nextval('officials_id_seq'::regclass),
  "jabatan_id" int4,
  "nama" varchar(150) COLLATE "pg_catalog"."default",
  "foto" varchar(255) COLLATE "pg_catalog"."default",
  "created_at" timestamp(6) DEFAULT CURRENT_TIMESTAMP,
  "updated_at" timestamp(6) DEFAULT CURRENT_TIMESTAMP,
  "event_reg_id" int4,
  "appr_status" int2,
  "appr_date" timestamp(6),
  "appr_notes" varchar(255) COLLATE "pg_catalog"."default",
  "created_by" int4
)
;

-- ----------------------------
-- Records of officials
-- ----------------------------

-- ----------------------------
-- Table structure for password_reset_tokens
-- ----------------------------
DROP TABLE IF EXISTS "public"."password_reset_tokens";
CREATE TABLE "public"."password_reset_tokens" (
  "email" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "token" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "created_at" timestamp(0)
)
;

-- ----------------------------
-- Records of password_reset_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS "public"."password_resets";
CREATE TABLE "public"."password_resets" (
  "email" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "token" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "created_at" timestamp(0)
)
;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS "public"."permissions";
CREATE TABLE "public"."permissions" (
  "id" int8 NOT NULL DEFAULT nextval('permissions_id_seq'::regclass),
  "desc" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;

-- ----------------------------
-- Records of permissions
-- ----------------------------

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS "public"."personal_access_tokens";
CREATE TABLE "public"."personal_access_tokens" (
  "id" int8 NOT NULL DEFAULT nextval('personal_access_tokens_id_seq'::regclass),
  "tokenable_type" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "tokenable_id" int8 NOT NULL,
  "name" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "token" varchar(64) COLLATE "pg_catalog"."default" NOT NULL,
  "abilities" text COLLATE "pg_catalog"."default",
  "last_used_at" timestamp(0),
  "expires_at" timestamp(0),
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for post_categories
-- ----------------------------
DROP TABLE IF EXISTS "public"."post_categories";
CREATE TABLE "public"."post_categories" (
  "id" int4 NOT NULL DEFAULT nextval('post_categories_id_seq'::regclass),
  "name" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "slug" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "created_at" timestamp(6) DEFAULT CURRENT_TIMESTAMP,
  "updated_at" timestamp(6) DEFAULT CURRENT_TIMESTAMP
)
;

-- ----------------------------
-- Records of post_categories
-- ----------------------------
INSERT INTO "public"."post_categories" VALUES (4, 'O2SN', 'O2SN', '2025-07-22 22:37:41.691475', '2025-07-22 22:37:41.691475');
INSERT INTO "public"."post_categories" VALUES (3, 'BAPOPSI', 'BAPOPSI', '2025-07-07 19:42:33.764958', '2025-07-07 19:42:33.764958');

-- ----------------------------
-- Table structure for posts
-- ----------------------------
DROP TABLE IF EXISTS "public"."posts";
CREATE TABLE "public"."posts" (
  "id" int4 NOT NULL DEFAULT nextval('posts_id_seq'::regclass),
  "title" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "slug" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "content" text COLLATE "pg_catalog"."default" NOT NULL,
  "thumbnail_url" varchar(500) COLLATE "pg_catalog"."default",
  "category_id" int4,
  "author_id" int4,
  "published_at" timestamp(6),
  "created_at" timestamp(6) DEFAULT CURRENT_TIMESTAMP,
  "updated_at" timestamp(6) DEFAULT CURRENT_TIMESTAMP,
  "tag" varchar(255) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of posts
-- ----------------------------
INSERT INTO "public"."posts" VALUES (4, 'Jadwal MotoGP 2025: Balapan Berikutnya di Sachsenring, Jerman .', 'jadwal-motogp-2025-balapan-berikutnya-di-sachsenring-jerman', '<p>Jakarta - Sudah 10 seri terlewati di MotoGP 2025, dengan race berikutnya digelar di Sachsenring, Jerman. Berikut jadwal MotoGP 2025 selengkapnya.<br>Ada 22 seri yang hadir di MotoGP musim ini. Sejauh ini sudah 10 seri yang tuntas digelar dengan balapan di Assen, Belanda, menjadi yang paling anyar di akhir bulan Juni lalu.<br><br>Di Sirkuit Assen dalam seri MotoGP Belanda 2025 tersebut, Marc Marquez berjaya di sprint race dan race utama. Rider Ducati Lenovo itu kini memuncaki klasemen MotoGP 2025 dengan 307 poin.<br><br>Baca artikel detiksport, "Jadwal MotoGP 2025: Balapan Berikutnya di Sachsenring, Jerman" selengkapnya <a href="https://sport.detik.com/moto-gp/d-7998073/jadwal-motogp-2025-balapan-berikutnya-di-sachsenring-jerman">https://sport.detik.com/moto-gp/d-7998073/jadwal-motogp-2025-balapan-berikutnya-di-sachsenring-jerman</a>.<br><br>Download Apps Detikcom Sekarang https://apps.detik.com/detik/</p>', 'uploads/posts/UTj3lDniUX9bJ3mw4Uexd1Oc44D2PoJLlKbhoJyo.jpg', 4, 1, '2025-07-07 20:16:18', '2025-07-07 20:16:18.20059', '2025-07-19 23:34:32', 'latest');
INSERT INTO "public"."posts" VALUES (3, 'Anthony Ginting & Gregoria Dipastikan Berangkat ke Japan & China Open 2025', 'anthony-ginting-gregoria-dipastikan-berangkat-ke-japan-china-open-2025-baca-artikel-detiksport-anthony-ginting-gregoria-dipastikan-berangkat-ke-japan-china-open-2025', '<p>Jakarta - PP PBSI memastikan akan mengirim Anthony Sinisuka Ginting dan Gregoria Mariska Tunjung ke Japan dan China Open 2025. Keduanya dinilai sudah siap tampil.<br>Ginting dan Jorji, sapaan Gregoria, sebelumnya absen di sejumlah kejuaraan. Ginting terkendala cedera bahu sejak Malaysia Open pada Januari lalu, sementara Jorji mengalami vertigo sejak Piala Sudirman di bulan April.<br><br>Baca artikel detiksport, "Anthony Ginting &amp; Gregoria Dipastikan Berangkat ke Japan &amp; China Open 2025" selengkapnya <a href="https://sport.detik.com/raket/d-8000449/anthony-ginting-gregoria-dipastikan-berangkat-ke-japan-china-open-2025">https://sport.detik.com/raket/d-8000449/anthony-ginting-gregoria-dipastikan-berangkat-ke-japan-china-open-2025</a>.<br><br>Download Apps Detikcom Sekarang <a href="https://apps.detik.com/detik/">https://apps.detik.com/detik/</a></p><p>Kepala Bidang Pembinaan Prestasi PP PBSI Eng Hian pada Senin (7/7/2025) ini memberikan kabar terbaru soal Ginting dan Gregoria. Keduanya dinilai sudah siap turun ke lapangan lagi dan akan dikirim ke Japan dan China Open 2025.<br><br>"Anthony Sinisuka Ginting dan Gregoria Mariska Tunjung dipastikan berangkat ke Jepang Open dan China Open setelah melihat kesiapan kedua atlet tersebut dari program-program latihan yang mereka jalani," ungkap Eng Hian dalam rilis yang diterima detikSport.<br><br>Baca artikel detiksport, "Anthony Ginting &amp; Gregoria Dipastikan Berangkat ke Japan &amp; China Open 2025" selengkapnya <a href="https://sport.detik.com/raket/d-8000449/anthony-ginting-gregoria-dipastikan-berangkat-ke-japan-china-open-2025">https://sport.detik.com/raket/d-8000449/anthony-ginting-gregoria-dipastikan-berangkat-ke-japan-china-open-2025</a>.<br><br>Download Apps Detikcom Sekarang https://apps.detik.com/detik/</p>', 'uploads/posts/8rePFP9UQRstLxwj0Wrba5qEpNhhINz2SpwjNAsy.jpg', 4, 1, '2025-07-07 20:10:37', '2025-07-07 20:10:37.69949', '2025-07-07 20:17:08', 'latest');
INSERT INTO "public"."posts" VALUES (2, 'Japan Open 2025: Leo/Bagas Dikalahkan Ganda Nonunggulan', 'japan-open-2025-leobagas-dikalahkan-ganda-nonunggulan', '<h2>How Nonprofits Run the Internet</h2><p>&nbsp;</p><p>With the near-constant stream of advertisements, sponsored content, and brand deals we see every day online, it can start to feel like the Internet is all about profit. While it is true that a lot of people make money on the Internet, nonprofits are actually at the heart of keeping it running.&nbsp;</p><p>Around the world, there are countless nonprofits focused on various components of the Internet. There are many that help build infrastructure to expand Internet access, advocate for users’ rights online, create tools and standards that help keep us more secure, and many other activities that all build on each other to create a better Internet for everyone.&nbsp;&nbsp;</p><p>There are even a handful of nonprofits in the Internet community that manage a lot of the unseen work that makes the Internet function. They are critical for ensuring that networks on the Internet have unique addresses and that people can read those addresses. Without them, we would not be able to send emails, register new websites, or even access existing ones. &nbsp;</p><p>If the Internet is a city, think of these nonprofits as creators of both the numerical postal codes, as well as the easier-to-remember street and house numbers that the postal codes translate to.&nbsp;</p>', 'uploads/posts/JG8xMlLuCoIAT4ByR3ND8IZTjtL9rD7GubpZU5Uv.jpg', 4, 1, '2025-06-24 22:04:54', '2025-06-24 22:04:54.719486', '2025-07-19 23:34:14', 'latest');
INSERT INTO "public"."posts" VALUES (5, 'Ogah Cabut, Si Kaki Kaca Kirim Peringatan ke Rekrutan Baru Real Madrid', 'ogah-cabut-si-kaki-kaca-kirim-peringatan-ke-rekrutan-baru-real-madrid', '<p>Pemain berkebangsaan Prancis itu bahkan mengirimkan peringatan ke rekrutan baru Los Blancos yang akan jadi pesaingnya di posisi bek kiri, Alvaro Carreras. Pada musim panas ini, <a href="https://www.bolasport.com/tag/real-madrid">Real Madrid</a> berencana melakukan pembersihan di skuadnya dengan mendepak beberapa pemain. Salah satu yang kabarnya hendak dijual adalah <a href="https://www.bolasport.com/tag/ferland-mendy">Ferland Mendy</a>. Pemain berposisi bek kiri ini hendak dijual karena kondisi yang dimilikinya.</p><p>Sejak didatangkan ke Madrid, Mendy banyak terlilit cedera. Terbaru, ia mengalami cedera otot yang membuatnya absen sejak akhir April 2025.</p><p>Karena banyak terlilit cedera dan memiliki gaji yang fantastis, Madrid mengobralnya dengan harga 14 juta euro (Rp264 miliar) saja.</p>', 'uploads/posts/RYGyk07kWTvJ3u2ElPdT6QAgJnlAxGXqZgaDigV9.jpg', 4, 1, '2025-07-31 16:25:44', '2025-07-31 16:25:44.185376', '2025-07-31 16:25:44.185376', 'latest');
INSERT INTO "public"."posts" VALUES (6, 'Barcelona di Ambang Cuan, The Next David Villa Diincar Klub Sultan', 'barcelona-di-ambang-cuan-the-next-david-villa-diincar-klub-sultan', '<p>Sosok pemain yang jadi target klub sultan itu adalah penyerang Blaugrana, <a href="https://www.bolasport.com/tag/ferran-torres">Ferran Torres</a>.</p><p>Dikutip BolaSport.com dari Sport Illustrated, klub sultan dari Arab Saudi siap memberikan penawaran besar ke Torres.</p><p>Disebutkan jika klub itu mau mengontraknya dengan bayaran fantastis yakni sebesar 60 juta euro (Rp1,1 triliun).</p><p>Bayaran tersebut untuk tiga tahun kontrak, sehingga Torres akan mendapat 20 juta euro (Rp376 miliar) per musim.</p><p>Selain memberikan penawaran besar untuk Torres, klub sultan Arab Saudi yang belum diketahui namanya itu juga siap memberikan tawaran fantastis untuk <a href="https://www.bolasport.com/tag/barcelona">Barcelona</a>.</p><p>Dilansir dari sumber yang sama, sang klub sultan siap memberi cek kosong alias memenuhi berapa pun permintaan Los Cules.</p><p>Tak ayal kabar ini menjadi kabar bahagia bagi Barca yang ingin merampingkan beban gaji dan memperbaiki keuangannya.</p><p>Akan tetapi, kabar ini juga bisa menjadi kabar buruk mengingat kepergian Torres bisa saja mengurangi kekuatan di lini serang.</p>', 'uploads/posts/TjkBKvly62eAdIRGxwC8xPtjFHnO6Ubyr83ktDzI.jpg', 4, 1, '2025-07-31 16:30:07', '2025-07-31 16:30:07.924138', '2025-07-31 16:30:07.924138', 'latest');
INSERT INTO "public"."posts" VALUES (7, 'Marc Marquez: Paruh Pertama Musim 2025 Cukup Sempurna!  Baca artikel detiksport', 'marc-marquez-paruh-pertama-musim-2025-cukup-sempurna-baca-artikel-detiksport', '<p>Jakarta - Marc Marquez nyaris tidak terbendung di paruh pertama MotoGP 2025. Pebalap Ducati pabrikan itu mengungkapkan rasa puas dengan hasilnya sejauh ini.<br>Menunggangi Desmosedici GP25, Marquez tak menghadapi perlawanan berarti dari rival-rivalnya dalam 12 seri pertama. Superstar balap motor Spanyol itu memenangi 19 dari total 24 balapan, termasuk delapan grand prix.<br><br>Hasil terburuk Marc Marquez adalah sekali gagal finis di Austin, yang disusul finis ke-12 di Jerez karena crash lebih dulu. Meski demikian, Marquez toh kini sangat nyaman memuncaki klasemen MotoGP sementara.</p><p>Pebalap berusia 32 tahun sudah mengumpulkan 381 poin, unggul 120 poin dari rival terdekatnya, Alex Marquez (Gresini). Dengan gap sebesar ini, Marc Marquez memungkinkan untuk bisa mengunci titel juara dunia 2025 sebelum kejuaraan berakhir apabila menjaga konsistensi.</p><p>"Sejauh ini adalah paruh pertama musim yang cukup sempurna," cetus dia dikutip Motosan. “Aku memang membuat kesalahan, sejumlah kesalahan besar, tapi pada akhirnya kami toh tidak sempurna.”</p><p>"Sekarang, seperti yang sudah kukatakan, waktunya untuk istirahat dan kemudian, dari Austria ke Valencia, tetap fokus penuh dan memberi seluruh kemampuan kami di setiap balapan dan setiap sesi latihan," ungkap Marc Marquez.<br><br>MotoGP 2025 baru akan berlanjut pada pertengahan Agustus. Seri ke-13 ini akan berlangsung di Red Bull Ring, Austria pada 15-17 Agustus.</p>', 'uploads/posts/vsWn4yqintC49sIIsKC15cfbBIWJaDMzojPVy7Ut.jpg', 4, 1, '2025-07-31 20:28:19', '2025-07-31 20:28:19.269636', '2025-07-31 20:28:19.269636', 'latest');

-- ----------------------------
-- Table structure for rayon
-- ----------------------------
DROP TABLE IF EXISTS "public"."rayon";
CREATE TABLE "public"."rayon" (
  "id" int4 NOT NULL DEFAULT nextval('rayon_id_seq'::regclass),
  "nama" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "keterangan" text COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of rayon
-- ----------------------------
INSERT INTO "public"."rayon" VALUES (2, '1', NULL);
INSERT INTO "public"."rayon" VALUES (4, '2', NULL);

-- ----------------------------
-- Table structure for rayon_kecamatan
-- ----------------------------
DROP TABLE IF EXISTS "public"."rayon_kecamatan";
CREATE TABLE "public"."rayon_kecamatan" (
  "id" int4 NOT NULL DEFAULT nextval('rayon_kecamatan_id_seq'::regclass),
  "rayon_id" int4,
  "kecamatan_id" int4
)
;

-- ----------------------------
-- Records of rayon_kecamatan
-- ----------------------------
INSERT INTO "public"."rayon_kecamatan" VALUES (10, 2, 1);
INSERT INTO "public"."rayon_kecamatan" VALUES (11, 2, 2);

-- ----------------------------
-- Table structure for registration_requests
-- ----------------------------
DROP TABLE IF EXISTS "public"."registration_requests";
CREATE TABLE "public"."registration_requests" (
  "id" int4 NOT NULL DEFAULT nextval('pengelola_id_seq'::regclass),
  "nama_lengkap" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "email" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "jenjang" varchar(10) COLLATE "pg_catalog"."default" NOT NULL,
  "username" varchar(50) COLLATE "pg_catalog"."default" NOT NULL,
  "password_hash" text COLLATE "pg_catalog"."default" NOT NULL,
  "kecamatan_id" int4,
  "sub_rayon_id" int4,
  "approval_status" int4,
  "approval_by" varchar(10) COLLATE "pg_catalog"."default",
  "approval_date" timestamp(6),
  "created_at" timestamp(6) DEFAULT CURRENT_TIMESTAMP
)
;

-- ----------------------------
-- Records of registration_requests
-- ----------------------------
INSERT INTO "public"."registration_requests" VALUES (16, 'Dimas Sulistyo', 'dimas.sulistyo@gmail.com', 'SMP', 'dimas.sulistyo', '$2y$10$0sGb2Mezwf6htJTb0Scr1e800g2INR6XewAZbOmIoqpqZzPzSlKRm', 1, 3, 1, NULL, '2025-07-07 15:26:33', '2025-07-07 15:25:34');

-- ----------------------------
-- Table structure for sport_classes
-- ----------------------------
DROP TABLE IF EXISTS "public"."sport_classes";
CREATE TABLE "public"."sport_classes" (
  "id" int4 NOT NULL DEFAULT nextval('sport_classes_id_seq'::regclass),
  "sport_id" int4,
  "name" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "description" text COLLATE "pg_catalog"."default",
  "created_at" timestamp(6) DEFAULT CURRENT_TIMESTAMP
)
;

-- ----------------------------
-- Records of sport_classes
-- ----------------------------
INSERT INTO "public"."sport_classes" VALUES (7, 2, 'PERORANGAN PUTRI', NULL, '2025-07-15 20:11:23.620621');
INSERT INTO "public"."sport_classes" VALUES (6, 2, 'NOMOR  LARI  PUTRA', NULL, '2025-06-24 23:54:44.945502');
INSERT INTO "public"."sport_classes" VALUES (8, 2, 'NOMOR  LOMPAT JAUH PUTRA', NULL, '2025-07-15 20:13:16.329875');
INSERT INTO "public"."sport_classes" VALUES (9, 2, 'NOMOR TOLAK PELURU  PUTRA', NULL, '2025-07-15 20:13:16.329875');
INSERT INTO "public"."sport_classes" VALUES (10, 2, 'NOMOR LARI PUTRI', NULL, '2025-07-15 20:13:16.329875');
INSERT INTO "public"."sport_classes" VALUES (11, 2, 'NOMOR LOMPAT JAUH  PUTRI', NULL, '2025-07-15 20:13:16.329875');
INSERT INTO "public"."sport_classes" VALUES (12, 2, 'NOMOR TOLAK PELURU PUTRI', NULL, '2025-07-15 20:13:16.329875');
INSERT INTO "public"."sport_classes" VALUES (1, 1, 'GAYA KUPU-KUPU PUTERA', NULL, '2025-06-19 12:56:34');
INSERT INTO "public"."sport_classes" VALUES (3, 1, 'GAYA KUPU-KUPU PUTERI', NULL, '2025-06-19 12:56:34');
INSERT INTO "public"."sport_classes" VALUES (2, 1, 'GAYA PUNGGUNG PUTERA', NULL, '2025-06-19 12:56:34');
INSERT INTO "public"."sport_classes" VALUES (13, 1, 'GAYA PUNGGUNG PUTERI', NULL, '2025-07-15 20:14:31.58902');
INSERT INTO "public"."sport_classes" VALUES (14, 1, 'GAYA DADA PUTERA', NULL, '2025-07-15 20:14:31.58902');
INSERT INTO "public"."sport_classes" VALUES (15, 1, 'GAYA DADA PUTERI', NULL, '2025-07-15 20:14:31.58902');
INSERT INTO "public"."sport_classes" VALUES (16, 1, 'GAYA BEBAS PUTERA', NULL, '2025-07-15 20:14:31.58902');
INSERT INTO "public"."sport_classes" VALUES (17, 1, 'GAYA BEBAS PUTERI', NULL, '2025-07-15 20:14:31.58902');
INSERT INTO "public"."sport_classes" VALUES (18, 1, '100 M (GAYA DADA PUTERA)', NULL, '2025-07-15 20:14:31.58902');
INSERT INTO "public"."sport_classes" VALUES (19, 1, '100 M (GAYA DADA PUTERI)', NULL, '2025-07-15 20:14:31.58902');
INSERT INTO "public"."sport_classes" VALUES (20, 1, '100 M (GAYA BEBAS PUTERA)', NULL, '2025-07-15 20:14:31.58902');
INSERT INTO "public"."sport_classes" VALUES (21, 1, '100 M (GAYA BEBAS PUTERI)', NULL, '2025-07-15 20:14:31.58902');
INSERT INTO "public"."sport_classes" VALUES (28, 18, 'NOMOR SERBA BISA PUTRA', NULL, '2025-07-15 23:18:34');
INSERT INTO "public"."sport_classes" VALUES (29, 18, 'NOMOR SERBA BISA PUTRI', NULL, '2025-07-15 23:18:34');
INSERT INTO "public"."sport_classes" VALUES (30, 18, 'NOMOR LANTAI', NULL, '2025-07-15 23:18:34');
INSERT INTO "public"."sport_classes" VALUES (31, 18, 'NOMOR KUDA PELANA/JAMUR', NULL, '2025-07-15 23:18:34');
INSERT INTO "public"."sport_classes" VALUES (32, 18, 'NOMOR BALOK KESEIMBANGAN', NULL, '2025-07-15 23:18:34');
INSERT INTO "public"."sport_classes" VALUES (33, 18, 'NOMOR MEJA LOMPAT', NULL, '2025-07-15 23:18:34');

-- ----------------------------
-- Table structure for sports
-- ----------------------------
DROP TABLE IF EXISTS "public"."sports";
CREATE TABLE "public"."sports" (
  "id" int4 NOT NULL DEFAULT nextval('sports_id_seq'::regclass),
  "name" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "description" text COLLATE "pg_catalog"."default",
  "created_at" timestamp(6) DEFAULT CURRENT_TIMESTAMP
)
;

-- ----------------------------
-- Records of sports
-- ----------------------------
INSERT INTO "public"."sports" VALUES (2, 'ATLETIK', 'ATLETIK', '2025-06-24 23:52:15');
INSERT INTO "public"."sports" VALUES (1, 'RENANG', 'RENANG', '2025-06-19 12:56:34');
INSERT INTO "public"."sports" VALUES (11, 'BULUTANGKIS', 'BULUTANGKIS', '2025-07-15 23:12:40');
INSERT INTO "public"."sports" VALUES (12, 'KARATE', 'KARATE', '2025-07-15 23:13:46');
INSERT INTO "public"."sports" VALUES (13, 'PENCAK SILAT', 'PENCAK SILAT', '2025-07-15 23:14:14');
INSERT INTO "public"."sports" VALUES (14, 'TENIS MEJA', 'TENIS MEJA', '2025-07-15 23:14:40');
INSERT INTO "public"."sports" VALUES (15, 'BOLA VOLI', 'BOLA VOLI', '2025-07-15 23:14:57');
INSERT INTO "public"."sports" VALUES (16, 'BOLA BASKET', 'BOLA BASKET', '2025-07-15 23:15:11');
INSERT INTO "public"."sports" VALUES (17, 'SEPAK TAKRAW', 'SEPAK TAKRAW', '2025-07-15 23:15:32');
INSERT INTO "public"."sports" VALUES (18, 'SENAM', 'SENAM', '2025-07-15 23:18:34');
INSERT INTO "public"."sports" VALUES (19, 'SEPAK BOLA', 'SEPAK BOLA', '2025-07-15 23:18:50');

-- ----------------------------
-- Table structure for sub_rayon
-- ----------------------------
DROP TABLE IF EXISTS "public"."sub_rayon";
CREATE TABLE "public"."sub_rayon" (
  "id" int4 NOT NULL DEFAULT nextval('sub_rayon_id_seq'::regclass),
  "nama" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "keterangan" text COLLATE "pg_catalog"."default",
  "kecamatan_id" int4
)
;

-- ----------------------------
-- Records of sub_rayon
-- ----------------------------
INSERT INTO "public"."sub_rayon" VALUES (3, '1', NULL, 1);
INSERT INTO "public"."sub_rayon" VALUES (2, '2', NULL, 2);
INSERT INTO "public"."sub_rayon" VALUES (4, '3', NULL, 1);
INSERT INTO "public"."sub_rayon" VALUES (5, '4', NULL, 1);
INSERT INTO "public"."sub_rayon" VALUES (6, '5', NULL, 1);
INSERT INTO "public"."sub_rayon" VALUES (7, '6', NULL, 1);
INSERT INTO "public"."sub_rayon" VALUES (8, '7', NULL, 1);
INSERT INTO "public"."sub_rayon" VALUES (9, '8', NULL, 1);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS "public"."users";
CREATE TABLE "public"."users" (
  "id" int8 NOT NULL DEFAULT nextval('users_id_seq'::regclass),
  "name" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "email" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "email_verified_at" timestamp(0),
  "password" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "remember_token" varchar(100) COLLATE "pg_catalog"."default",
  "group_id" int8,
  "created_at" timestamp(0),
  "updated_at" timestamp(0),
  "is_active" int2,
  "cabor_id" int4
)
;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO "public"."users" VALUES (1, 'superadmin', 'superadmin@gmail.com', NULL, '$2a$12$gtl3eqR9BpQSXpXTu5V0xOFRBtL1MTlHWOdCVgz0ipaaSy8DPaN1m', NULL, 1, '2024-11-23 04:36:01', '2025-01-29 11:21:23', 1, NULL);
INSERT INTO "public"."users" VALUES (1124, 'admin', 'admin@gmail.com', NULL, '$2y$10$ofkwzxnbbFLpV0BS/Zb8JeRqKaSIwdzhF8yWNzscoMXJt2pjRz/8W', NULL, 14, '2025-07-07 03:17:09', NULL, 1, NULL);
INSERT INTO "public"."users" VALUES (1125, 'admin.cabor', 'admin.cabor@gmail.com', NULL, '$2y$10$.y3N2VaSQLU8DlGjFoSNpO.7ktun3SH94mLThkn2bUbw.LiaqPdZi', NULL, 16, '2025-07-07 03:17:30', NULL, 1, NULL);
INSERT INTO "public"."users" VALUES (1126, 'dimas.sulistyo', 'dimas.sulistyo@gmail.com', NULL, '$2y$10$0sGb2Mezwf6htJTb0Scr1e800g2INR6XewAZbOmIoqpqZzPzSlKRm', NULL, 15, '2025-07-07 15:26:33', '2025-07-07 15:26:33', 1, NULL);

-- ----------------------------
-- Function structure for connectby
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."connectby"(text, text, text, text, int4);
CREATE OR REPLACE FUNCTION "public"."connectby"(text, text, text, text, int4)
  RETURNS SETOF "pg_catalog"."record" AS '$libdir/tablefunc', 'connectby_text'
  LANGUAGE c STABLE STRICT
  COST 1
  ROWS 1000;

-- ----------------------------
-- Function structure for connectby
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."connectby"(text, text, text, text, int4, text);
CREATE OR REPLACE FUNCTION "public"."connectby"(text, text, text, text, int4, text)
  RETURNS SETOF "pg_catalog"."record" AS '$libdir/tablefunc', 'connectby_text'
  LANGUAGE c STABLE STRICT
  COST 1
  ROWS 1000;

-- ----------------------------
-- Function structure for connectby
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."connectby"(text, text, text, text, text, int4);
CREATE OR REPLACE FUNCTION "public"."connectby"(text, text, text, text, text, int4)
  RETURNS SETOF "pg_catalog"."record" AS '$libdir/tablefunc', 'connectby_text_serial'
  LANGUAGE c STABLE STRICT
  COST 1
  ROWS 1000;

-- ----------------------------
-- Function structure for connectby
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."connectby"(text, text, text, text, text, int4, text);
CREATE OR REPLACE FUNCTION "public"."connectby"(text, text, text, text, text, int4, text)
  RETURNS SETOF "pg_catalog"."record" AS '$libdir/tablefunc', 'connectby_text_serial'
  LANGUAGE c STABLE STRICT
  COST 1
  ROWS 1000;

-- ----------------------------
-- Procedure structure for create_journal_proc
-- ----------------------------
DROP PROCEDURE IF EXISTS "public"."create_journal_proc"("p_reference_type" varchar, "p_reference_id" varchar, "p_description" text, "p_amount" numeric);
CREATE OR REPLACE PROCEDURE "public"."create_journal_proc"("p_reference_type" varchar, "p_reference_id" varchar, "p_description" text, "p_amount" numeric)
 AS $BODY$
DECLARE
    v_journal_id INT;
    v_rule RECORD;
    v_journal_number VARCHAR;
BEGIN
    -- Generate unique journal number
    v_journal_number := generate_journal_number();

    -- Insert journal header
    INSERT INTO journals (code, description, reference, status, created_at, reference_type)
    VALUES (v_journal_number, p_description, p_reference_id, 'DRAFT', NOW(), p_reference_type)
    RETURNING id INTO v_journal_id;

    -- Get transaction rules
    FOR v_rule IN 
        SELECT * FROM journal_matrix WHERE reference_type = p_reference_type 
    LOOP
        -- Insert debit entry
        INSERT INTO journal_entries (journal_id, account_id, debit, credit) 
        VALUES (v_journal_id, v_rule.debit_account_id, p_amount, 0);

        -- Insert credit entry
        INSERT INTO journal_entries (journal_id, account_id, debit, credit) 
        VALUES (v_journal_id, v_rule.credit_account_id, 0, p_amount);
    END LOOP;
    
EXCEPTION WHEN OTHERS THEN
    -- Error handling
    RAISE EXCEPTION 'Error inserting journal: %', SQLERRM;
END;
$BODY$
  LANGUAGE plpgsql;

-- ----------------------------
-- Function structure for crosstab
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."crosstab"(text, text);
CREATE OR REPLACE FUNCTION "public"."crosstab"(text, text)
  RETURNS SETOF "pg_catalog"."record" AS '$libdir/tablefunc', 'crosstab_hash'
  LANGUAGE c STABLE STRICT
  COST 1
  ROWS 1000;

-- ----------------------------
-- Function structure for crosstab
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."crosstab"(text);
CREATE OR REPLACE FUNCTION "public"."crosstab"(text)
  RETURNS SETOF "pg_catalog"."record" AS '$libdir/tablefunc', 'crosstab'
  LANGUAGE c STABLE STRICT
  COST 1
  ROWS 1000;

-- ----------------------------
-- Function structure for crosstab
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."crosstab"(text, int4);
CREATE OR REPLACE FUNCTION "public"."crosstab"(text, int4)
  RETURNS SETOF "pg_catalog"."record" AS '$libdir/tablefunc', 'crosstab'
  LANGUAGE c STABLE STRICT
  COST 1
  ROWS 1000;

-- ----------------------------
-- Function structure for crosstab2
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."crosstab2"(text);
CREATE OR REPLACE FUNCTION "public"."crosstab2"(text)
  RETURNS SETOF "public"."tablefunc_crosstab_2" AS '$libdir/tablefunc', 'crosstab'
  LANGUAGE c STABLE STRICT
  COST 1
  ROWS 1000;

-- ----------------------------
-- Function structure for crosstab3
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."crosstab3"(text);
CREATE OR REPLACE FUNCTION "public"."crosstab3"(text)
  RETURNS SETOF "public"."tablefunc_crosstab_3" AS '$libdir/tablefunc', 'crosstab'
  LANGUAGE c STABLE STRICT
  COST 1
  ROWS 1000;

-- ----------------------------
-- Function structure for crosstab4
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."crosstab4"(text);
CREATE OR REPLACE FUNCTION "public"."crosstab4"(text)
  RETURNS SETOF "public"."tablefunc_crosstab_4" AS '$libdir/tablefunc', 'crosstab'
  LANGUAGE c STABLE STRICT
  COST 1
  ROWS 1000;

-- ----------------------------
-- Function structure for generate_invoice_number
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."generate_invoice_number"();
CREATE OR REPLACE FUNCTION "public"."generate_invoice_number"()
  RETURNS "pg_catalog"."text" AS $BODY$
DECLARE
    seq_val BIGINT;
    formatted_date TEXT;
    invoice_number TEXT;
BEGIN
    -- Ambil nilai berikutnya dari sequence
    SELECT nextval('invoice_number_seq') INTO seq_val;
    
    -- Format tanggal saat ini dalam format YYYYMM
    SELECT to_char(CURRENT_DATE, 'YYYYMM') INTO formatted_date;
    
    -- Gabungkan bagian-bagian untuk membentuk nomor invoice dengan format INV-PB-YYYYMMNNNNN
    invoice_number := 'INV-PB-' || formatted_date || LPAD(seq_val::TEXT, 5, '0');
    
    RETURN invoice_number;
END;
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;

-- ----------------------------
-- Function structure for generate_journal_number
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."generate_journal_number"();
CREATE OR REPLACE FUNCTION "public"."generate_journal_number"()
  RETURNS "pg_catalog"."text" AS $BODY$
DECLARE
  seq_num TEXT;
  year_month TEXT;
BEGIN
  -- Get the current year and month in YYYYMM format
  year_month := TO_CHAR(CURRENT_DATE, 'YYYYMM');
  
  -- Get the next sequence value, padded to 5 digits
  seq_num := LPAD(NEXTVAL('journal_sequence')::TEXT, 5, '0');
  
  -- Combine the fixed part, year_month, and sequence number
  RETURN 'J' || year_month || seq_num;
END;
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;

-- ----------------------------
-- Function structure for generate_purchase_order_number
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."generate_purchase_order_number"();
CREATE OR REPLACE FUNCTION "public"."generate_purchase_order_number"()
  RETURNS "pg_catalog"."text" AS $BODY$
DECLARE
  seq_num TEXT;
  year_month TEXT;
BEGIN
  -- Get the current year and month in YYYYMM format
  year_month := TO_CHAR(CURRENT_DATE, 'YYYYMM');
  
  -- Get the next sequence value, padded to 5 digits
  seq_num := LPAD(NEXTVAL('purchase_order_sequence')::TEXT, 5, '0');
  
  -- Combine the fixed part, year_month, and sequence number
  RETURN 'PO' || year_month || seq_num;
END;
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;

-- ----------------------------
-- Function structure for generate_purchase_request_number
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."generate_purchase_request_number"();
CREATE OR REPLACE FUNCTION "public"."generate_purchase_request_number"()
  RETURNS "pg_catalog"."text" AS $BODY$
DECLARE
  seq_num TEXT;
  year_month TEXT;
BEGIN
  -- Get the current year and month in YYYYMM format
  year_month := TO_CHAR(CURRENT_DATE, 'YYYYMM');
  
  -- Get the next sequence value, padded to 5 digits
  seq_num := LPAD(NEXTVAL('purchase_request_sequence')::TEXT, 5, '0');
  
  -- Combine the fixed part, year_month, and sequence number
  RETURN 'PR' || year_month || seq_num;
END;
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;

-- ----------------------------
-- Function structure for generate_transaction_code
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."generate_transaction_code"("params" varchar);
CREATE OR REPLACE FUNCTION "public"."generate_transaction_code"("params" varchar)
  RETURNS "pg_catalog"."varchar" AS $BODY$
DECLARE
    current_year VARCHAR;
    current_month VARCHAR;
    new_sequence INTEGER;
    padded_sequence VARCHAR;
BEGIN
    -- Validate params
    IF params IS NULL OR params = '' THEN
        RAISE EXCEPTION 'Branch code cannot be null or empty';
    END IF;

    -- Get the current year and month
    current_year := TO_CHAR(NOW(), 'YYYY');  -- Current year (YYYY)
    current_month := TO_CHAR(NOW(), 'MM');   -- Current month (MM)

    -- Ensure the branch sequence exists or initialize it
    PERFORM 1 FROM branch_sequences WHERE branch_code = params;
    IF NOT FOUND THEN
        INSERT INTO branch_sequences (branch_code, current_sequence)
        VALUES (params, 0);
    END IF;

    -- Increment and fetch the new sequence value
    UPDATE branch_sequences
    SET current_sequence = current_sequence + 1, updated_at = NOW()
    WHERE branch_code = params
    RETURNING current_sequence INTO new_sequence;

    -- Format the sequence number as a 5-digit string (pad with leading zeros)
    padded_sequence := LPAD(new_sequence::TEXT, 5, '0');

    -- Generate the final transaction code
    RETURN params || current_year || current_month || padded_sequence;
END;
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;

-- ----------------------------
-- Function structure for normal_rand
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."normal_rand"(int4, float8, float8);
CREATE OR REPLACE FUNCTION "public"."normal_rand"(int4, float8, float8)
  RETURNS SETOF "pg_catalog"."float8" AS '$libdir/tablefunc', 'normal_rand'
  LANGUAGE c VOLATILE STRICT
  COST 1
  ROWS 1000;

-- ----------------------------
-- Function structure for update_timestamp
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."update_timestamp"();
CREATE OR REPLACE FUNCTION "public"."update_timestamp"()
  RETURNS "pg_catalog"."trigger" AS $BODY$
BEGIN
    NEW.updated_at = CURRENT_TIMESTAMP;
    RETURN NEW;
END;
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."agendas_id_seq"
OWNED BY "public"."agendas"."id";
SELECT setval('"public"."agendas_id_seq"', 2, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."atlet_id_seq"
OWNED BY "public"."atlet"."id";
SELECT setval('"public"."atlet_id_seq"', 59, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"public"."customers_id_seq"', 23, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."event_categories_id_seq"
OWNED BY "public"."event_categories"."id";
SELECT setval('"public"."event_categories_id_seq"', 3, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."event_registrations_id_seq"
OWNED BY "public"."event_registrations"."id";
SELECT setval('"public"."event_registrations_id_seq"', 20, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."events_id_seq"
OWNED BY "public"."events"."id";
SELECT setval('"public"."events_id_seq"', 9, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."failed_jobs_id_seq"
OWNED BY "public"."failed_jobs"."id";
SELECT setval('"public"."failed_jobs_id_seq"', 1, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"public"."fresh_chicken_cut_results_id_seq"', 23, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."galleries_id_seq"
OWNED BY "public"."galleries"."id";
SELECT setval('"public"."galleries_id_seq"', 9, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."gallery_categories_id_seq"
OWNED BY "public"."gallery_categories"."id";
SELECT setval('"public"."gallery_categories_id_seq"', 2, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."gallery_images_id_seq"
OWNED BY "public"."gallery_images"."id";
SELECT setval('"public"."gallery_images_id_seq"', 1, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"public"."invoice_number_seq"', 27, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."jabatan_official_id_seq"
OWNED BY "public"."jabatan_official"."id";
SELECT setval('"public"."jabatan_official_id_seq"', 5, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."jadwal_pertandingan_id_seq"
OWNED BY "public"."jadwal_pertandingan"."id";
SELECT setval('"public"."jadwal_pertandingan_id_seq"', 6, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"public"."journal_sequence"', 180, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."kecamatan_id_seq"
OWNED BY "public"."kecamatan"."id";
SELECT setval('"public"."kecamatan_id_seq"', 1, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."managers_id_seq"
OWNED BY "public"."managers"."id";
SELECT setval('"public"."managers_id_seq"', 3, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."medals_id_seq"
OWNED BY "public"."medals"."id";
SELECT setval('"public"."medals_id_seq"', 6, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."menus_id_seq"
OWNED BY "public"."menus"."id";
SELECT setval('"public"."menus_id_seq"', 119, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."migrations_id_seq"
OWNED BY "public"."migrations"."id";
SELECT setval('"public"."migrations_id_seq"', 7, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."officials_id_seq"
OWNED BY "public"."officials"."id";
SELECT setval('"public"."officials_id_seq"', 63, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"public"."parting_cut_result_details_id_seq"', 1, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"public"."parting_cut_results_id_seq"', 17, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"public"."partings_id_seq"', 5, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."pengelola_id_seq"
OWNED BY "public"."registration_requests"."id";
SELECT setval('"public"."pengelola_id_seq"', 16, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."permissions_id_seq"
OWNED BY "public"."permissions"."id";
SELECT setval('"public"."permissions_id_seq"', 1, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."personal_access_tokens_id_seq"
OWNED BY "public"."personal_access_tokens"."id";
SELECT setval('"public"."personal_access_tokens_id_seq"', 1, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."post_categories_id_seq"
OWNED BY "public"."post_categories"."id";
SELECT setval('"public"."post_categories_id_seq"', 4, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."posts_id_seq"
OWNED BY "public"."posts"."id";
SELECT setval('"public"."posts_id_seq"', 7, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"public"."purchase_order_sequence"', 48, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"public"."purchase_request_sequence"', 42, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."rayon_id_seq"
OWNED BY "public"."rayon"."id";
SELECT setval('"public"."rayon_id_seq"', 4, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."rayon_kecamatan_id_seq"
OWNED BY "public"."rayon_kecamatan"."id";
SELECT setval('"public"."rayon_kecamatan_id_seq"', 11, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."role_menu_access_id_seq"
OWNED BY "public"."group_menu_access"."id";
SELECT setval('"public"."role_menu_access_id_seq"', 217, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."sport_classes_id_seq"
OWNED BY "public"."sport_classes"."id";
SELECT setval('"public"."sport_classes_id_seq"', 33, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."sports_id_seq"
OWNED BY "public"."sports"."id";
SELECT setval('"public"."sports_id_seq"', 19, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."sub_rayon_id_seq"
OWNED BY "public"."sub_rayon"."id";
SELECT setval('"public"."sub_rayon_id_seq"', 9, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"public"."transaction_code_sequence"', 29, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."user_groups_id_seq"
OWNED BY "public"."groups"."id";
SELECT setval('"public"."user_groups_id_seq"', 16, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."users_id_seq"
OWNED BY "public"."users"."id";
SELECT setval('"public"."users_id_seq"', 1126, true);

-- ----------------------------
-- Primary Key structure for table agendas
-- ----------------------------
ALTER TABLE "public"."agendas" ADD CONSTRAINT "agendas_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table atlet
-- ----------------------------
ALTER TABLE "public"."atlet" ADD CONSTRAINT "atlet_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table event_categories
-- ----------------------------
ALTER TABLE "public"."event_categories" ADD CONSTRAINT "event_categories_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table event_registrations
-- ----------------------------
ALTER TABLE "public"."event_registrations" ADD CONSTRAINT "event_registrations_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table events
-- ----------------------------
ALTER TABLE "public"."events" ADD CONSTRAINT "events_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Uniques structure for table failed_jobs
-- ----------------------------
ALTER TABLE "public"."failed_jobs" ADD CONSTRAINT "failed_jobs_uuid_unique" UNIQUE ("uuid");

-- ----------------------------
-- Primary Key structure for table failed_jobs
-- ----------------------------
ALTER TABLE "public"."failed_jobs" ADD CONSTRAINT "failed_jobs_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table galleries
-- ----------------------------
ALTER TABLE "public"."galleries" ADD CONSTRAINT "galleries_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Uniques structure for table gallery_categories
-- ----------------------------
ALTER TABLE "public"."gallery_categories" ADD CONSTRAINT "gallery_categories_slug_key" UNIQUE ("slug");

-- ----------------------------
-- Primary Key structure for table gallery_categories
-- ----------------------------
ALTER TABLE "public"."gallery_categories" ADD CONSTRAINT "gallery_categories_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table gallery_images
-- ----------------------------
ALTER TABLE "public"."gallery_images" ADD CONSTRAINT "gallery_images_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table group_menu_access
-- ----------------------------
ALTER TABLE "public"."group_menu_access" ADD CONSTRAINT "role_menu_access_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table groups
-- ----------------------------
ALTER TABLE "public"."groups" ADD CONSTRAINT "user_groups_pkey" PRIMARY KEY ("id", "code");

-- ----------------------------
-- Primary Key structure for table jabatan_official
-- ----------------------------
ALTER TABLE "public"."jabatan_official" ADD CONSTRAINT "jabatan_official_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table jadwal_pertandingan
-- ----------------------------
ALTER TABLE "public"."jadwal_pertandingan" ADD CONSTRAINT "jadwal_pertandingan_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Uniques structure for table kecamatan
-- ----------------------------
ALTER TABLE "public"."kecamatan" ADD CONSTRAINT "kecamatan_kode_kecamatan_key" UNIQUE ("kode");

-- ----------------------------
-- Primary Key structure for table kecamatan
-- ----------------------------
ALTER TABLE "public"."kecamatan" ADD CONSTRAINT "kecamatan_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Uniques structure for table managers
-- ----------------------------
ALTER TABLE "public"."managers" ADD CONSTRAINT "managers_email_key" UNIQUE ("email");

-- ----------------------------
-- Primary Key structure for table managers
-- ----------------------------
ALTER TABLE "public"."managers" ADD CONSTRAINT "managers_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Checks structure for table medals
-- ----------------------------
ALTER TABLE "public"."medals" ADD CONSTRAINT "medals_medal_type_check" CHECK (medal_type::text = ANY (ARRAY['emas'::character varying, 'perak'::character varying, 'perunggu'::character varying]::text[]));

-- ----------------------------
-- Primary Key structure for table medals
-- ----------------------------
ALTER TABLE "public"."medals" ADD CONSTRAINT "medals_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table menus
-- ----------------------------
ALTER TABLE "public"."menus" ADD CONSTRAINT "menus_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table migrations
-- ----------------------------
ALTER TABLE "public"."migrations" ADD CONSTRAINT "migrations_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table officials
-- ----------------------------
ALTER TABLE "public"."officials" ADD CONSTRAINT "officials_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table password_reset_tokens
-- ----------------------------
ALTER TABLE "public"."password_reset_tokens" ADD CONSTRAINT "password_reset_tokens_pkey" PRIMARY KEY ("email");

-- ----------------------------
-- Indexes structure for table password_resets
-- ----------------------------
CREATE INDEX "password_resets_email_index" ON "public"."password_resets" USING btree (
  "email" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST
);

-- ----------------------------
-- Primary Key structure for table permissions
-- ----------------------------
ALTER TABLE "public"."permissions" ADD CONSTRAINT "permissions_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Indexes structure for table personal_access_tokens
-- ----------------------------
CREATE INDEX "personal_access_tokens_tokenable_type_tokenable_id_index" ON "public"."personal_access_tokens" USING btree (
  "tokenable_type" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST,
  "tokenable_id" "pg_catalog"."int8_ops" ASC NULLS LAST
);

-- ----------------------------
-- Uniques structure for table personal_access_tokens
-- ----------------------------
ALTER TABLE "public"."personal_access_tokens" ADD CONSTRAINT "personal_access_tokens_token_unique" UNIQUE ("token");

-- ----------------------------
-- Primary Key structure for table personal_access_tokens
-- ----------------------------
ALTER TABLE "public"."personal_access_tokens" ADD CONSTRAINT "personal_access_tokens_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Uniques structure for table post_categories
-- ----------------------------
ALTER TABLE "public"."post_categories" ADD CONSTRAINT "post_categories_slug_key" UNIQUE ("slug");

-- ----------------------------
-- Primary Key structure for table post_categories
-- ----------------------------
ALTER TABLE "public"."post_categories" ADD CONSTRAINT "post_categories_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Uniques structure for table posts
-- ----------------------------
ALTER TABLE "public"."posts" ADD CONSTRAINT "posts_slug_key" UNIQUE ("slug");

-- ----------------------------
-- Primary Key structure for table posts
-- ----------------------------
ALTER TABLE "public"."posts" ADD CONSTRAINT "posts_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table rayon
-- ----------------------------
ALTER TABLE "public"."rayon" ADD CONSTRAINT "rayon_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Uniques structure for table rayon_kecamatan
-- ----------------------------
ALTER TABLE "public"."rayon_kecamatan" ADD CONSTRAINT "rayon_kecamatan_kecamatan_id_key" UNIQUE ("kecamatan_id");

-- ----------------------------
-- Primary Key structure for table rayon_kecamatan
-- ----------------------------
ALTER TABLE "public"."rayon_kecamatan" ADD CONSTRAINT "rayon_kecamatan_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Uniques structure for table registration_requests
-- ----------------------------
ALTER TABLE "public"."registration_requests" ADD CONSTRAINT "pengelola_email_key" UNIQUE ("email");
ALTER TABLE "public"."registration_requests" ADD CONSTRAINT "pengelola_username_key" UNIQUE ("username");

-- ----------------------------
-- Checks structure for table registration_requests
-- ----------------------------
ALTER TABLE "public"."registration_requests" ADD CONSTRAINT "pengelola_jenjang_check" CHECK (jenjang::text = ANY (ARRAY['SD'::character varying, 'SMP'::character varying]::text[]));

-- ----------------------------
-- Primary Key structure for table registration_requests
-- ----------------------------
ALTER TABLE "public"."registration_requests" ADD CONSTRAINT "pengelola_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Uniques structure for table sport_classes
-- ----------------------------
ALTER TABLE "public"."sport_classes" ADD CONSTRAINT "sport_classes_sport_id_name_key" UNIQUE ("sport_id", "name");

-- ----------------------------
-- Primary Key structure for table sport_classes
-- ----------------------------
ALTER TABLE "public"."sport_classes" ADD CONSTRAINT "sport_classes_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Uniques structure for table sports
-- ----------------------------
ALTER TABLE "public"."sports" ADD CONSTRAINT "sports_name_key" UNIQUE ("name");

-- ----------------------------
-- Primary Key structure for table sports
-- ----------------------------
ALTER TABLE "public"."sports" ADD CONSTRAINT "sports_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table sub_rayon
-- ----------------------------
ALTER TABLE "public"."sub_rayon" ADD CONSTRAINT "sub_rayon_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Uniques structure for table users
-- ----------------------------
ALTER TABLE "public"."users" ADD CONSTRAINT "users_email_unique" UNIQUE ("email");

-- ----------------------------
-- Primary Key structure for table users
-- ----------------------------
ALTER TABLE "public"."users" ADD CONSTRAINT "users_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Foreign Keys structure for table event_registrations
-- ----------------------------
ALTER TABLE "public"."event_registrations" ADD CONSTRAINT "event_registrations_approved_by_fkey" FOREIGN KEY ("approved_by") REFERENCES "public"."users" ("id") ON DELETE SET NULL ON UPDATE NO ACTION;
ALTER TABLE "public"."event_registrations" ADD CONSTRAINT "event_registrations_event_id_fkey" FOREIGN KEY ("event_id") REFERENCES "public"."events" ("id") ON DELETE CASCADE ON UPDATE NO ACTION;
ALTER TABLE "public"."event_registrations" ADD CONSTRAINT "event_registrations_manager_id_fkey" FOREIGN KEY ("manager_id") REFERENCES "public"."managers" ("id") ON DELETE CASCADE ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Keys structure for table galleries
-- ----------------------------
ALTER TABLE "public"."galleries" ADD CONSTRAINT "galleries_category_id_fkey" FOREIGN KEY ("category_id") REFERENCES "public"."gallery_categories" ("id") ON DELETE SET NULL ON UPDATE NO ACTION;
ALTER TABLE "public"."galleries" ADD CONSTRAINT "galleries_created_by_fkey" FOREIGN KEY ("created_by") REFERENCES "public"."users" ("id") ON DELETE SET NULL ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Keys structure for table gallery_images
-- ----------------------------
ALTER TABLE "public"."gallery_images" ADD CONSTRAINT "gallery_images_gallery_id_fkey" FOREIGN KEY ("gallery_id") REFERENCES "public"."galleries" ("id") ON DELETE CASCADE ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Keys structure for table managers
-- ----------------------------
ALTER TABLE "public"."managers" ADD CONSTRAINT "managers_kecamatan_id_fkey" FOREIGN KEY ("kecamatan_id") REFERENCES "public"."kecamatan" ("id") ON DELETE CASCADE ON UPDATE NO ACTION;
ALTER TABLE "public"."managers" ADD CONSTRAINT "managers_sub_rayon_id_fkey" FOREIGN KEY ("sub_rayon_id") REFERENCES "public"."sub_rayon" ("id") ON DELETE CASCADE ON UPDATE NO ACTION;
ALTER TABLE "public"."managers" ADD CONSTRAINT "managers_user_id_fkey" FOREIGN KEY ("user_id") REFERENCES "public"."users" ("id") ON DELETE CASCADE ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Keys structure for table medals
-- ----------------------------
ALTER TABLE "public"."medals" ADD CONSTRAINT "medals_athlete_id_fkey" FOREIGN KEY ("atlet_id") REFERENCES "public"."atlet" ("id") ON DELETE CASCADE ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Keys structure for table menus
-- ----------------------------
ALTER TABLE "public"."menus" ADD CONSTRAINT "menus_parent_id_fkey" FOREIGN KEY ("parent_id") REFERENCES "public"."menus" ("id") ON DELETE CASCADE ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Keys structure for table posts
-- ----------------------------
ALTER TABLE "public"."posts" ADD CONSTRAINT "posts_author_id_fkey" FOREIGN KEY ("author_id") REFERENCES "public"."users" ("id") ON DELETE SET NULL ON UPDATE NO ACTION;
ALTER TABLE "public"."posts" ADD CONSTRAINT "posts_category_id_fkey" FOREIGN KEY ("category_id") REFERENCES "public"."post_categories" ("id") ON DELETE SET NULL ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Keys structure for table rayon_kecamatan
-- ----------------------------
ALTER TABLE "public"."rayon_kecamatan" ADD CONSTRAINT "rayon_kecamatan_kecamatan_id_fkey" FOREIGN KEY ("kecamatan_id") REFERENCES "public"."kecamatan" ("id") ON DELETE CASCADE ON UPDATE NO ACTION;
ALTER TABLE "public"."rayon_kecamatan" ADD CONSTRAINT "rayon_kecamatan_rayon_id_fkey" FOREIGN KEY ("rayon_id") REFERENCES "public"."rayon" ("id") ON DELETE CASCADE ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Keys structure for table registration_requests
-- ----------------------------
ALTER TABLE "public"."registration_requests" ADD CONSTRAINT "pengelola_kecamatan_id_fkey" FOREIGN KEY ("kecamatan_id") REFERENCES "public"."kecamatan" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Keys structure for table sport_classes
-- ----------------------------
ALTER TABLE "public"."sport_classes" ADD CONSTRAINT "sport_classes_sport_id_fkey" FOREIGN KEY ("sport_id") REFERENCES "public"."sports" ("id") ON DELETE CASCADE ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Keys structure for table sub_rayon
-- ----------------------------
ALTER TABLE "public"."sub_rayon" ADD CONSTRAINT "sub_rayon_rayon_id_fkey" FOREIGN KEY ("kecamatan_id") REFERENCES "public"."kecamatan" ("id") ON DELETE CASCADE ON UPDATE NO ACTION;
