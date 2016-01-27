CREATE TABLE "guestbook" (
  "id" serial NOT NULL,
  "name" character varying(100),
  "email" character varying(100),
  "comment" text,
  "created_at" integer DEFAULT NULL,
  CONSTRAINT guestbook_pkey PRIMARY KEY (id )
);