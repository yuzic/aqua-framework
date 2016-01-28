CREATE TABLE "comment" (
  "id" serial,
  "name" character varying(100),
  "email" character varying(100),
  "message" text,
  "created_at" integer DEFAULT NULL,
  CONSTRAINT comment_pkey PRIMARY KEY (id )
);
