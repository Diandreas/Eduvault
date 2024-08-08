<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('profession', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->primary('id');
        });

        // Ajouter les nouvelles colonnes à la table users
        Schema::table('users', function (Blueprint $table) {
            $table->string('surname', 45)->nullable();
            $table->string('address', 255);
            $table->unsignedBigInteger('profession_id');
            $table->timestamp('create_time')->useCurrent();

            // Ajouter la clé étrangère pour profession_id
            $table->foreign('profession_id')->references('id')->on('profession')->onDelete('no action')->onUpdate('no action');
        });

        // Créer les autres tables


        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('name', 45)->nullable();
            $table->string('abbr', 45)->nullable();
            $table->primary('id');
        });

        Schema::create('course', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->nullable();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->primary('id');
            $table->foreign('parent_id')->references('id')->on('course')->onDelete('no action')->onUpdate('no action');
        });

        Schema::create('school', function (Blueprint $table) {
            $table->id();
            $table->string('image', 250)->nullable();
            $table->string('name', 100)->nullable();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('country_id');
            $table->string('ville', 245)->nullable();
            $table->primary(['id', 'country_id']);
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('no action')->onUpdate('no action');
        });

        Schema::create('grade', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->text('description')->nullable();
            $table->primary('id');
        });

        Schema::create('period', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->text('description')->nullable();
            $table->string('periodcol', 45)->nullable();
            $table->primary('id');
        });

        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('name', 45);
            $table->string('path', 250);
            $table->string('format', 10);
            $table->string('size', 100);
            $table->dateTime('create_at');
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('school_id');
            $table->unsignedBigInteger('grade_id');
            $table->unsignedBigInteger('documents_id');
            $table->unsignedBigInteger('documents_course_id');
            $table->unsignedBigInteger('documents_school_id');
            $table->unsignedBigInteger('documents_grade_id');
            $table->unsignedBigInteger('period_id');
            $table->primary(['id', 'course_id', 'school_id', 'grade_id', 'documents_id', 'documents_course_id', 'documents_school_id', 'documents_grade_id', 'period_id']);

            $table->foreign('course_id')->references('id')->on('course')->onDelete('no action')->onUpdate('no action');
            $table->foreign('school_id')->references('id')->on('school')->onDelete('no action')->onUpdate('no action');
            $table->foreign('grade_id')->references('id')->on('grade')->onDelete('no action')->onUpdate('no action');

            // Spécifiez un nom court pour cette contrainte
            $table->foreign(['documents_id', 'documents_course_id', 'documents_school_id', 'documents_grade_id'])
                ->references(['id', 'course_id', 'school_id', 'grade_id'])->on('documents')
                ->onDelete('no action')->onUpdate('no action')
                ->name('fk_documents_docs');

            $table->foreign('period_id')->references('id')->on('period')->onDelete('no action')->onUpdate('no action');
        });


        Schema::create('users_has_level', function (Blueprint $table) {
            $table->unsignedBigInteger('users_id');
            $table->unsignedBigInteger('grade_id');
            $table->primary(['users_id', 'grade_id']);
            $table->foreign('users_id')->references('id')->on('users')->onDelete('no action')->onUpdate('no action');
            $table->foreign('grade_id')->references('id')->on('grade')->onDelete('no action')->onUpdate('no action');
        });

        Schema::create('school_has_grade', function (Blueprint $table) {
            $table->unsignedBigInteger('school_id');
            $table->unsignedBigInteger('school_country_id');
            $table->unsignedBigInteger('grade_id');
            $table->primary(['school_id', 'school_country_id', 'grade_id']);
            $table->foreign(['school_id', 'school_country_id'])->references(['id', 'country_id'])->on('school')->onDelete('no action')->onUpdate('no action');
            $table->foreign('grade_id')->references('id')->on('grade')->onDelete('no action')->onUpdate('no action');
        });

        Schema::create('chrono', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->primary('id');
        });

        Schema::create('chrono_has_documents', function (Blueprint $table) {
            $table->unsignedBigInteger('chrono_id');
            $table->unsignedBigInteger('documents_id');
            $table->unsignedBigInteger('documents_course_id');
            $table->unsignedBigInteger('documents_school_id');
            $table->unsignedBigInteger('documents_grade_id');
            $table->string('status', 45)->nullable();
            $table->primary(['chrono_id', 'documents_id', 'documents_course_id', 'documents_school_id', 'documents_grade_id']);
            $table->foreign('chrono_id')->references('id')->on('chrono')->onDelete('no action')->onUpdate('no action');
            $table->foreign(['documents_id', 'documents_course_id', 'documents_school_id', 'documents_grade_id'])
                ->references(['id', 'course_id', 'school_id', 'grade_id'])
                ->on('documents')
                ->onDelete('no action')
                ->onUpdate('no action')
            ->name('fk_chrono_has_docs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chrono_has_documents');
        Schema::dropIfExists('chrono');
        Schema::dropIfExists('school_has_grade');
        Schema::dropIfExists('users_has_level');
        Schema::dropIfExists('documents');
        Schema::dropIfExists('period');
        Schema::dropIfExists('grade');
        Schema::dropIfExists('school');
        Schema::dropIfExists('course');
        Schema::dropIfExists('countries');
        Schema::dropIfExists('profession');

        // Supprimer les nouvelles colonnes de la table users
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('surname');
            $table->dropColumn('address');
            $table->dropColumn('profession_id');
            $table->dropColumn('create_time');
        });
    }
};
