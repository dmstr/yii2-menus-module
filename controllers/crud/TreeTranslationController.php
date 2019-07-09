<?php

namespace dmstr\modules\menu\controllers\crud;

/**
 * @package dmstr\modules\menu\controllers\crud
 */
class TreeTranslationController extends \yii\web\Controller
{
    /**
     * Deletes an existing TreeTranslation model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     *
     * @param integer $id
     *
     * @return mixed
     * @throws \Throwable
     */
    public function actionDelete($id) {
        try {
            $this->findModel($id)->delete();
        } catch (\Exception $e) {
            $msg = $e->errorInfo[2] ?? $e->getMessage();
            \Yii::$app->getSession()->addFlash('error', $msg);
            return $this->redirect(Url::previous());
        }

        // TODO: should just reload form (AJAX)
        return $this->redirect('/pages');
    }


    /**
     * Finds the TreeTranslation model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @throws HttpException if the model cannot be found
     *
     * @param integer $id
     *
     * @return \dmstr\modules\menu\models\TreeTranslation
     */
    protected function findModel($id) {
        if (($model = \dmstr\modules\menu\models\TreeTranslation::findOne($id)) !== null) {
            return $model;
        }

        throw new HttpException(404, 'The requested page does not exist.');
    }
}